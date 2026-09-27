module.exports = {
  env: {
    browser: true,
    es2021: true,
  },
  parserOptions: {
    ecmaVersion: "latest",
    sourceType: "module",
  },
  rules: {
    indent: [0, 4],
    "space-before-function-paren": [
      "error",
      { anonymous: "always", named: "never" },
    ],
  },
};
