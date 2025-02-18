<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrol Suhu ESP8266</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .container {
            width: 350px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        button {
            margin-top: 10px;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }
        .btn-auto { background-color: #28a745; color: white; }
        .btn-manual { background-color: #007bff; color: white; }
        .btn-temp { background-color: #ff9800; color: white; width: 100px; margin: 5px; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Kontrol Suhu ESP8266</h2>
        <p>Status Mode: <strong id="mode-status">Memuat...</strong></p>
        <p>Suhu API Eksternal: <strong>{{ $temperature }}°C</strong></p>

        <!-- Tombol Mode -->
        <button id="btn-auto" class="btn-auto" onclick="setMode(true)">Mode Otomatis</button>
        <button id="btn-manual" class="btn-manual" onclick="setMode(false)">Mode Manual</button>

        <!-- Kontrol Suhu Manual -->
        <div id="manual-controls" style="display: none;">
            <p>Atur Suhu Manual:</p>
            <button class="btn-temp" onclick="setTemperature(15)">15°C</button>
            <button class="btn-temp" onclick="setTemperature(25)">25°C</button>
            <button class="btn-temp" onclick="setTemperature(30)">30°C</button>
        </div>
    </div>

    <script>
        // Mengambil status mode dan suhu saat ini
        function fetchStatus() {
            axios.get("{{ url('/api/get-mode') }}")
                .then(response => {
                    let data = response.data;
                    let modeStatus = data.isAutomatic ? "Otomatis" : "Manual";
                    document.getElementById("mode-status").innerText = modeStatus;

                    if (data.isAutomatic) {
                        document.getElementById("manual-controls").style.display = "none";
                    } else {
                        document.getElementById("manual-controls").style.display = "block";
                    }
                })
                .catch(error => console.error("Gagal mendapatkan status:", error));
        }

        // Ubah mode (Otomatis/Manual)
        function setMode(isAutomatic) {
            axios.post("{{ url('/api/set-mode') }}", { isAutomatic })
                .then(response => {
                    alert(response.data.message);
                    fetchStatus();
                })
                .catch(error => console.error("Gagal mengubah mode:", error));
        }

        // Atur suhu manual (hanya aktif di mode Manual)
        function setTemperature(temp) {
            axios.post("{{ url('/api/set-temperature') }}", { temperature: temp })
                .then(response => {
                    alert(response.data.message);
                })
                .catch(error => console.error("Gagal mengubah suhu:", error));
        }

        // Load status saat halaman dibuka
        fetchStatus();
    </script>

</body>
</html>
