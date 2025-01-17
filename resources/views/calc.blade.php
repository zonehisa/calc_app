<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>計算アプリ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .calculator {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px; /* 幅を指定 */
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            font-size: 1.5em;
            padding: 10px;
            border: 1px solid #28a745;
            border-radius: 5px;
            background-color: #e9f7ef; /* 背景色を追加 */
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h1>計算アプリ</h1>
        <form id="calcForm">
            @csrf
            <input type="number" name="number1" id="number1" placeholder="数値1" required>
            <select name="calculation" id="calculation" required>
                <option value="addition">加算</option>
                <option value="subtraction">減算</option>
                <option value="multiplication">乗算</option>
                <option value="division">除算</option>
            </select>
            <input type="number" name="number2" id="number2" placeholder="数値2" required>
            <button type="submit">計算</button>
        </form>
        <div class="result" id="result"></div>
    </div>

    <script>
        document.getElementById('calcForm').addEventListener('submit', function(event) {
            event.preventDefault(); // フォームのデフォルトの送信を防ぐ

            const formData = new FormData(this);
            const url = '/calcs';

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value // CSRFトークンを追加
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('ネットワークエラーが発生しました。');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('result').innerHTML = `結果: ${data.result}`; // 結果を表示
            })
            .catch(error => {
                document.getElementById('result').innerHTML = `<span class="error">${error.message}</span>`;
            });
        });
    </script>
</body>
</html>
