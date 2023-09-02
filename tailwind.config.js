import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                transparent: "transparent",
                current: "currentColor",
                red: colors.red,
                'green' : '#1aab8b',
                'red-100' : '#fee2e2',
                gray: {
                    300: '#d1d5db'
                },
                // yellow: colors.amber,
                // black: colors.black,
                // white: colors.white,
                // gray: colors.trueGray,
                // "gray-background": "#f7f8fc",
                // blue: "#328af1",
                // "blue-hover": "#2879bd",
                // yellow: "#ffc73c",
                // red: "#ec454f",
                // "red-100": "#fee2e2",
                // green: "#1aab8b",
                //"green-700": "#1aab8b",
                // purple: "#8b60ed",
            },
            spacing: {
                22: "5.5rem",
                44: "11rem",
                70: "17.5rem",
                76: "19rem",
                104: "26rem",
                128: "32rem",
                175: "43.75rem",
            },
            maxWidth: {
                custom: "68.5rem",
            },
            boxShadow: {
                card: "4px 4px 15px 0 rgba(36, 37, 38, 0.08)",
                dialog: "3px 4px 15px 0 rgba(36, 37, 38, 0.22)",
            },
            fontFamily: {
                sans: ["Open Sans", ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                xxs: ["0.625rem", { lineHeight: "1rem" }],
            },
        },
    },

    darkMode: "media",

    plugins: [
        forms,
        typography,
        require("flowbite/plugin"),
        require("flowbite-typography"),
    ],
};
