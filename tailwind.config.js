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
            animation: {
                'fade-in': 'fadeIn 0.5s ease-out',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0', transform: 'translateY(10px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
