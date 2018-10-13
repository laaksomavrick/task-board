module.exports = {
    root: true,
    env: {
        browser: true,
        es6: true
    },
    extends: [
        "plugin:vue/essential",
        "plugin:prettier/recommended",
        "eslint:recommended"
    ],
    parserOptions: {
        sourceType: "module",
        ecmaVersion: 2017
    },
    rules: {
        indent: ["error", 4],
        "linebreak-style": ["error", "unix"]
    }
};
