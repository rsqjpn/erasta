/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                inter: ["Inter", "sans-serif"], // Mengganti font default Tailwind
                poppins: [ "Poppins", "serif"], // Mengganti font default Tailwind
            },
            colors: {
                main: ['#cfe3f0'],
                sec: ['#7ca5bf'],
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
