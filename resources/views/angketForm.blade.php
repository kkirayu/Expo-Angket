<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Angket</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'
        integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'>
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100"
    style="background-image: url('{{ asset('assets/img/Expo.png') }}'); background-size: cover; background-position: center;"
    class="bg-gray-100">


   

    <div class="container mx-auto mt-40 mb-40">
        <div class="max-w-xs mx-auto bg-white rounded-md p-6 shadow-md lg:max-w-2xl mt-5">

            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "Terimakasih Sudah Mengisi Angket",
                        text: "Success"
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "Oppss, Ayo benerin",
                        text: "kalau bener nanti dipeluk zeta"
                    });
                </script>
            @endif

            <form id="myForm" action="{{ route('angket.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h2 class="text-2xl font-semibold mb-4">Data Diri:</h2>
                <input type="hidden" name="acaraId" value="{{ $acara->id }}">
                <div class="mb-5">
                    <label for="nama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="vestia Zeta" required>
                </div>

                <!-- Input for Email -->
                <div class="mb-5">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="zeta@gmail.com" required>
                </div>
                <div class="mb-5">
                    <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Angket
                        Untuk</label>
                    <select name="instansi" id="instansi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option value="" readonly='true'>--Select Angket--</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">
                                {{ $role->role }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="max-w-xs mx-auto bg-white rounded-md p-6 shadow-md lg:max-w-2xl mt-5">
                    <h2 class="text-2xl font-semibold mb-4 p-5">Soal Angket {{ $acara->nama_acara }}</h2>
                    <div id="questions-container" class="mb-4 p-10">
                        <div id="questions" class="space-y-4">
                            <!-- Questions will be inserted here -->

                        </div>
                        <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 rounded-md mt-4 float-right">Submit</button>
                        <a href="{{ route('indexLp') }}"  class="bg-red-500 text-white py-2 px-4 rounded-md mt-4 float-right mr-3">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'
    integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'>
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('#instansi').change(function() {
        var selected_option = $(this).val();
        $.ajax({
            url: 'http://localhost:8000/api/pertanyaan-role/' + selected_option,
            type: 'get',
            cache: false,
            success: function(data) {
                var questionsDiv = document.getElementById('questions');
                questionsDiv.innerHTML = '';
                console.log(data.data);
                data.data.forEach(function(question, index) {
                    var questionDiv = document.createElement('div');
                    console.log(question.id, question.pertanyaan);
                    questionDiv.innerHTML = `
                        <p class="text-lg font-medium">${index + 1}: ${question.pertanyaan}</p>
                    <div class="ml-5">
                    <label class="block">
                        <input type="radio" name="jawaban[${question.id}]" value="4" required class="mt-2">
                        <span class="ml-2">Sangat Baik</span>
                    </label>
                    <label class="block">
                        <input type="radio" name="jawaban[${question.id}]" value="3" required class="mt-2">
                        <span class="ml-2">Baik</span>
                    </label>
                    <label class="block">
                        <input type="radio" name="jawaban[${question.id}]" value="2" required class="mt-2">
                        <span class="ml-2">Kurang baik</span>
                    </label>
                    <label class="block">
                        <input type="radio" name="jawaban[${question.id}]" value="1" required class="mt-2">
                        <span class="ml-2">Sangat kurang baik</span>
                    </label>
                    <input type="hidden" name="question_ids[]" value="${question.id}">
                    </div>
                    `;

                    questionsDiv.append(questionDiv);
                });
            }
        });
    });
</script>

</html>
