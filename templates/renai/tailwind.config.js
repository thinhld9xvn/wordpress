module.exports = {
  purge: { enabled: true, content: ['./public/*.html'] }, 
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      textColor: {
        primary: '#F58233',
        
      },
      colors: {
        primary: '#F58233',
        "secondary": '#2A5CAA',
        "renai-blue": '#93BEFF',
        "renai-light-gray": '#F8F8F8',
        "renai-gray": '#E0E0E0',
      },
      fontFamily: {
        sans: 
        ['Google Sans'],
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
