module.exports = {
  excludeFiles: [
    '.git',
    'node_modules',
    'build_*',
    'vendor',
  ],
  format: 'html',
  lang: 'ru',
  fileExtensions: [
    '.md',
  ],
  ignoreUrls: true,
  ignoreDigits: true,
  ignoreCapitalization: true,
  ignoreUppercase: true,
  ignoreLatin: true,
  checkYo: true,
  dictionary: [
    '(не|де)?(сериализ).*',
    'сериализ.*',
    'трейт.*',
    'предпроверк.*',
    'неймспейс.*',
    'тинькофф',
    'полумарафон.*',
  ],
};
