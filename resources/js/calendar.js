import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";

document.addEventListener("DOMContentLoaded", function () {
    const calendarEl = document.getElementById("calendar");
    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: "dayGridMonth",
        events: "http://127.0.0.1:8000/events", // endpoint untuk mendapatkan event
        aspectRatio: 1.5, // Menyesuaikan aspek rasio agar lebih ramping di layar kecil
        headerToolbar: {
            start: "title",
            center: "",
            end: "prev,next",
        }, // Minimal tombol navigasi
        contentHeight: "auto", // Tinggi konten menyesuaikan
    });
    calendar.render();
});
