module.exports = {
	parser: '@typescript-eslint/parser',
	plugins: ['@typescript-eslint'],
	root: true,
	// root: true,
	// parser: '@typescript-eslint/parser',
	parserOptions: {
		tsconfigRootDir: __dirname,
		project: './tsconfig.json',
		ecmaVersion: 'es2021',
	},
	env: {
		node: true,
		commonjs: true,
		es2021: true,
	},
	extends: [
		'eslint:recommended',
		'plugin:@typescript-eslint/recommended',
		// 'plugin:@typescript-eslint/recommended-requiring-type-checking',
		// 'standard-with-typescript',
		'plugin:import/recommended',
		'plugin:import/typescript',
		// 'plugin:promise/recommended',
		'plugin:n/recommended',
		'plugin:prettier/recommended',
	],
	plugins: ['@typescript-eslint', 'import', 'n'],
	rules: {
		'import/no-unresolved': 'error',
		'n/no-unsupported-features/es-syntax': [
			'error',
			{
				version: '>=12.0.0',
				ignores: [],
			},
		],
		'n/shebang': 'error',
	},
	settings: {
		node: {
			convertPath: [
				{
					include: ['src/**/*.ts'],
					exclude: ['**/*.spec.js'],
					replace: ['^src/(.+)$', 'lib/$1'],
				},
			],
		},
		'import/parsers': {
			'@typescript-eslint/parser': ['.ts', '.tsx'],
		},
	},
};
