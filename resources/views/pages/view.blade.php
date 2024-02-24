<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <h1>Manage Data</h1>
                        <a href="{{ route('add-new') }}" class="btn btn-active btn-neutral btn-xs ml-3">Add New</a>
                    </div>
                </div>
                <div class="px-36 mb-5 mt-10">
                    <div id="messageContainer" class="mt-3"></div>
                    <table id="example" class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                          <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">#</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">User Name</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Shape</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Color</td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Timestamp</td>
                          </tr>
                        </thead>
                      <tbody class="text-gray-700">

                      </tbody>
                      </table>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="
    https://cdn.jsdelivr.net/npm/moment@2.30.1/moment.min.js"></script>
    <script>
        $(document).ready(function () {
            var dataTable = $('#example').DataTable({
                "ajax": "{{ route('fetchAll') }}",
                "pageLength": 10,
                "lengthChange": false,
                "columns": [
                    {
                        "data": null,
                        "render": function (data, type, row, meta) {

                            return meta.row + 1;
                        }
                    },
                    {"data": "user.name"},
                    {"data": "shape"},
                    {"data": "color"},
                    {
                        "data": "created_at",
                        "render": function (data, type, row, meta) {
                            // Format the date using moment.js
                            return moment(data).format('YYYY-MM-DD HH:mm:ss');
                        }

                    },

                ]
            });

             // Attach a click event listener to dynamically created "Delete" links
            $('#example').on('click', '.delete-entry', function (e) {
                e.preventDefault();

                var entryId = $(this).data('entry-id');

                $.ajax({
                    type: 'DELETE',
                    url: '/api/delete/' + entryId,
                    success: function (response) {
                        console.log(response.success);
                        dataTable.ajax.reload();
                        $('#messageContainer').html('<span class="text-success">' + response.success + '</span>');
                    },
                    error: function (error) {
                            if (error.responseJSON && error.responseJSON.errors) {
                            // Loop through and display validation errors
                            var errorHtml = '<ul class="text-red-600">';
                            $.each(error.responseJSON.errors, function(key, value) {
                                errorHtml += '<li>' + value + '</li>';
                            });
                            errorHtml += '</ul>';

                            // Display errors in the error container
                            $('#messageContainer').html(errorHtml);                        // Handle errors or show a notification
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>
