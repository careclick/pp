const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  theme: {
    extend: {
      colors:{
        'blue-wise' : '#3aacfa',
      },
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
      },
      spacing: {
        '14': '3.5rem',
        '80': '28rem',
      },
      width: theme => ({
        auto: 'auto',
        ...theme('spacing'),
        '2/2': '77.5%',
        '3/3': '64%',
        '6/4': '77.5%',
        '4/3': '23.5%',
      }),
    },
  },
  variants: {
    borderWidth: ['responsive', 'first', 'hover', 'focus'],
  },
  plugins: [
    require('@tailwindcss/ui')({
      layout: 'sidebar',
    })
  ],
}
