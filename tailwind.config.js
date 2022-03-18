module.exports = {
  purge: {
    content: [
      'source/**/*.html',
      'source/**/*.md',
      'source/**/*.js',
      'source/**/*.php',
      'source/**/*.vue',
    ],
    options: {
      safelist: [
        /language/,
        /hljs/,
        /mce/,
      ],
    },
  },
  theme: {
    container: {
      center: true,
      padding: '1rem',
    },
    fontSize: {
      xs: ['12px', '16px'],
      sm: ['14px', '18px'],
      base: ['16px', '20px'],
      lg: ['18px', '22px'],
      xl: ['20px', '25px'],
      '2xl': ['24px', '32px'],
      '3xl': ['30px', '36px'],
      '4xl': ['36px', '45px'],
      '5xl': ['40px', '54px'],
      '6xl': ['48px', '60px'],
    },
    extend: {
      typography: {
        DEFAULT: {
          css: {
            code: {
              backgroundColor: '#f3f7f9',
              display: 'inline',
              lineHeight: 1.5,
              color: '#45658a',
              fontSize: '.875rem',
              width: '80%',
              padding: '3px 7px',
              fontWeight: 400,
            },
            'code::before': false,
            'code::after': false,
            pre: {
              backgroundColor: '#f3f7f9',
              color: '#45658a',
            },
            h1: {
              color: '#212130',
            },
            h2: {
              color: '#212130',
            },
            h3: {
              color: '#212130',
            },
          },
        },
      },
      fontFamily: {
        sans: 'Manrope',
      },
      colors: {
        'dark-purplish-blue': '#212130',
      },
      boxShadow: {
        xs: '0px 5px 5px rgba(75, 93, 104, 0.1)',
        '3xl': '10px 40px 50px rgba(229, 233, 246, 0.4)',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('tailwindcss-debug-screens'),
    require('./plugins/flexgap'),
  ],
}