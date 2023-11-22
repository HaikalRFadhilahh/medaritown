/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php"],
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
      },
      colors: {
        "primary-color": "#255145",
        "icon-color": "#438B77",
        "bg-icon": "#D3F4EB",
      },
    },
  },
  plugins: [],
};
