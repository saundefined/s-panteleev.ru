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
    fontFamily: {
      'sans': ['"Montserrat", sans-serif'],
    },
    extend: {
      typography: {
        DEFAULT: {
          css: {
            h2: {
              color: '#363d47',
              fontWeight: 600,
              lineHeight: 1.2,
            },
            h3: {
              color: '#363d47',
              fontWeight: 600,
              lineHeight: 1.2,
            },
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
          },
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
  variants: {
    extend: {
      padding: ['hover'],
    },
  },
};