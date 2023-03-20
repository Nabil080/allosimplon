/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./build/*.{html,js,php}"],
  theme: {
    extend: {
      colors:{
        'main': {
          light: '#00A9A5',
          default: '#0B5351',
          dark: '#092327',
          hover: '#1B7673',
      },
      }
    },
  },
  plugins: [],
}