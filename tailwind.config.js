/**
 * Container Plugin - modifies Tailwind’s default container.
 */
const containerStyles = ({ addComponents }) => {
  const containerBase = {
    maxWidth: '100%',
    marginLeft: 'auto',
    marginRight: 'auto',
    paddingLeft: '20px',
    paddingRight: '20px',
    '@screen md': {
      paddingLeft: '40px',
      paddingRight: '40px'
    },
    '@screen lg': {
      paddingLeft: '40px',
      paddingRight: '40px'
    },
    '@screen 2xl': {
      paddingLeft: '80px',
      paddingRight: '80px'
    }
  };

  addComponents({
    '.container': {
      ...containerBase,
      '@screen xl': {
        width: '100%',
        maxWidth: '1680px',
        paddingLeft: '80px',
        paddingRight: '80px'
      }
    },
    '.container-fluid': {
      ...containerBase,
      '@screen lg': {
        paddingLeft: '80px',
        paddingRight: '80px'
      }
    },
  });
}

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './footer.php',
    './header.php',
    './index.php',
    './includes/shortcodes.php',
    './parts/*.php',
    './parts/**/*.php',
    './blocks/**/*.php',
    './src/scss/**/*.scss',
    './src/js/**/*.js',
  ],
  theme: {
    container: {
      center: true,
    },
    fontFamily: {
      sans: ['Graphik', 'sans-serif'],
      'sans-medium': ['Graphik Medium', 'sans-serif'],
      'sans-alt': ['Roboto', 'sans-serif'],
      heading: ['Nib Pro', 'sans-serif'],
      //'heading-semi': ['Nib Pro SemiBold', 'sans-serif']
    },
    screens: {
      'sm': '340px',
      'md': '630px',
      'lg': '1024px',
      'xl': '1440px',
      '2xl': '1680px',
    },
    extend: {
      colors: {
        blue: '#023E7D',
        'light-blue': '#17A0DB',
        metal: '#8199B1',
        navy: '#0D2033',
        'dark-blue': '#003974',
        black: '#2D2D2D',
        gray: '#F2F2F2',
        'dark-gray': '#424242',
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    containerStyles,
  ],
}

