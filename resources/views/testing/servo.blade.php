<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrol Servo ESP8266</title>
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
        .slider-container {
            display: none;
            margin-top: 10px;
        }
        .slider {
            width: 100%;
        }
        .slider-label {
            font-size: 18px;
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Kontrol Servo ESP8266</h2>
        <p>Status Mode: <strong id="mode-status">Memuat...</strong></p>
        <p>Sudut Servo Saat Ini: <strong id="current-angle">90</strong>°</p>

        <!-- Tombol Mode -->
        <button id="btn-auto" class="btn-auto" onclick="setMode(true)">Mode Otomatis</button>
        <button id="btn-manual" class="btn-manual" onclick="setMode(false)">Mode Manual</button>

        <!-- Slider untuk Mode Manual -->
        <div id="manual-controls" class="slider-container">
            <p>Atur Sudut Servo:</p>
            <input type="range" min="0" max="180" step="1" value="90" id="servo-slider" class="slider" oninput="updateSliderValue(this.value)">
            <p class="slider-label">Sudut: <span id="slider-value">90</span>°</p>
            <button onclick="setServoAngle()">Set Sudut</button>
        </div>
    </div>

    <script>
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

                    document.getElementById("servo-slider").value = data.angle;
                    document.getElementById("slider-value").innerText = data.angle;
                    document.getElementById("current-angle").innerText = data.angle;
                })
                .catch(error => console.error("Gagal mendapatkan status:", error));
        }

        function setMode(isAutomatic) {
            axios.post("{{ url('/api/set-mode') }}", { isAutomatic })
                .then(response => {
                    alert(response.data.message);
                    fetchStatus();
                })
                .catch(error => console.error("Gagal mengubah mode:", error));
        }

        function updateSliderValue(value) {
            document.getElementById("slider-value").innerText = value;
        }

        function setServoAngle() {
            let angle = document.getElementById("servo-slider").value;
            axios.post("{{ url('/api/set-angle') }}", { angle: angle })
                .then(response => {
                    alert(response.data.message);
                    document.getElementById("current-angle").innerText = angle;
                })
                .catch(error => console.error("Gagal mengubah sudut servo:", error));
        }

        fetchStatus();
    </script>

</body>
</html>
