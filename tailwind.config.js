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
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
