// https://tailwindcss.com/docs/configuration
module.exports = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  'prefix': 'tw-',
  theme: {
    extend: {
      boxShadow: {
        'agoda': '0 4px 18px 0 rgba(0, 0, 0, 0.1)'
      }
    },
    fontFamily: {
      // 'agoda-sans-stem': ['AgodaSansStem'],
      'agoda-sans-stemless': ['AgodaSansStemless'],
      // 'agoda-sans-stemless-bold': ['AgodaSansStemlessBold'],
      'agoda-sans-text': ['AgodaSansText'],
      // 'agoda-sans-text-bold': ['AgodaSansTextBold'],
      // 'agoda-sans-text-black': ['AgodaSansTextBlack']
      'conforta': ['Comfortaa'],
    },
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1990px',
      // '2xl': '1536px',
    }
  },
  plugins: [
    require('@tailwindcss/line-clamp')
  ],
};
