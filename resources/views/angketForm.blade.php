<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Angket</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-md mx-auto bg-white rounded-md p-6 shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Pertanyaan Angket</h2>

        <form action="{{ route('angkets.store') }}" method="post">
            @csrf

            @foreach($soal as $question)
            <div class="mb-4">
                <p class="text-lg font-medium">{{ $question->pertanyaan }}</p>
                <div class="mt-2">
                    @for($i = 1; $i <= 4; $i++)
                        <label class="flex items-center">
                            <input type="radio" name="jawaban[{{ $question->id }}]" value="{{ $i }}" class="mr-2">
                            <span>{{ $question->{"option_" . $i} }}</span>
                            @if ($i === 1)
                                <span class="ml-2">(Sangat Buruk)</span>
                            @elseif ($i === 2)
                                <span class="ml-2">(Buruk)</span>
                            @elseif ($i === 3)
                                <span class="ml-2">(Baik)</span>
                            @elseif ($i === 4)
                                <span class="ml-2">(Sangat Baik)</span>
                            @endif
                        </label>
                    @endfor
                </div>
            </div>
            
            @endforeach

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md mt-4">Submit</button>
        </form>
    </div>

</body>
</html>
