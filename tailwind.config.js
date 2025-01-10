/** @type {import('tailwindcss').Config} */
module.exports = {
  corePlugins: {
    preflight: true,
  },
  content: [
    "./public/**/*.php",
    "./formulaires/**/*.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
