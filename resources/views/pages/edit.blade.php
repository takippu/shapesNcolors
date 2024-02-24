<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <h1>Manage Data</h1>
                        @hasrole('Admin')
                        <a href="{{ route('dashboard') }}" class="btn btn-active btn-neutral btn-xs ml-3">Go Back</a>
                        @else
                        <a href="{{ route('viewAll') }}" class="btn btn-active btn-neutral btn-xs ml-3">Go Back</a>
                        @endhasrole
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="flex justify-center mt-12">
                        <h2>Add This Entry</h2>
                    </div>
                    <div class="flex justify-center mt-5">
                        <div>
                        <form id="updateEntry">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col space-y-2" id="div">
                                <label for="color" class="text-sm font-medium">User: {{ $user->name }}</label>

                                <label for="color" class="text-sm font-medium">Color:</label>
                                <select id="color" name="color" class="border rounded-md px-3 py-2 focus:outline-none w-full">
                                    <option value="">Select Color</option>
                                    <option value="red"  {{ $shapesAndColors->color == "red" ? 'selected' : '' }}>Red</option>
                                    <option value="green"{{ $shapesAndColors->color == "green" ? 'selected' : '' }}>Green</option>
                                    <option value="blue" {{ $shapesAndColors->color == "blue" ? 'selected' : '' }}>Blue</option>
                                </select>

                                <label for="shape" class="text-sm font-medium">Shape:</label>
                                <select id="shape" name="shape" class="border rounded-md px-3 py-2 focus:outline-none w-full">
                                    <option value="">Select Shape</option>
                                    <option value="circle" {{ $shapesAndColors->shape == "circle" ? 'selected' : '' }}>Circle</option>
                                    <option value="square" {{ $shapesAndColors->shape == "square" ? 'selected' : '' }}>Square</option>
                                    <option value="triangle" {{ $shapesAndColors->shape == "triangle" ? 'selected' : '' }}>Triangle</option>
                                </select>

                                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}"></input>
                                {{-- entry id to update --}}
                                <input type="hidden" id="entry_id" value="{{ $shapesAndColors->id }}">

                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                        </form>
                        <div id="messageContainer" class="mt-3"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#updateEntry').submit(function(e) {
                e.preventDefault();
                // Get the entry ID
                var entryId = $('#entry_id').val();

                $.ajax({
                    url: '/api/update/'+ entryId, // Replace with your actual API endpoint
                    type: 'PUT',
                    data: {
                        // Add your form data here
                        user_id: $('#user_id').val(),
                        color: $('#color').val(),
                        shape: $('#shape').val(),
                        // Add other fields as needed
                    },
                    success: function(response) {
                        console.log(response.success);
                        $('#messageContainer').html('<span class="text-success">' + response.success + '</span>');
                    },
                    error: function(error) {
                        if (error.responseJSON && error.responseJSON.errors) {
                        // Loop through and display validation errors
                        var errorHtml = '<ul class="text-red-600">';
                        $.each(error.responseJSON.errors, function(key, value) {
                            errorHtml += '<li>' + value + '</li>';
                        });
                        errorHtml += '</ul>';

                        // Display errors in the error container
                        $('#messageContainer').html(errorHtml);
                    } else {
                        // Handle other AJAX errors
                        console.log(error);
                    }
                    }
                });
            });
        });
    </script>
</x-app-layout>
