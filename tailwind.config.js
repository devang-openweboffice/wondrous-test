module.exports = {
	mode: 'jit',
	content: [
		'./src/**/*.php',
		'./template-parts/**/*.php',
		'./templates/*.php',
		'./*.php',
		'./inc/**/*.php',
		'./inc/*.php',
		'./src/**/*.js',
	],
	theme: {
		container: {
			center: true,
            screens: {
				'sm': '1024px',
                'md': '1104px',
                'lg': '1280px', 
                'xl': '1340px',
                '2xl': '1640px',
            },
			padding: {
				DEFAULT: '1.5rem',
				sm: '2.5rem',
			},
        },
		extend: {
			boxShadow: {
				'3xl': '7px 7px 11px 0 rgba(0, 0, 0, 0.29)',
				'bottom': '0 3px 6px 0 rgba(0, 0, 0, 0.25)',
				'card-item': '0 3px 6px 3px rgba(0, 0, 0, 0.16)',
			},
			screens: {
				'3xl': '1640px',
				'xs': '460px'
			},
		},
		colors: {
			'primary': '#F7A600',
			'yellolight': '#FFD375',
			'black': '#000000',
			'white': '#ffffff',
			'lightBlack': '#002026',
			'lightgray': '#777776',
			'lightergray': '#A5A5A4',
			'gray': '#D2D2D1',
			'coffe': '#312100',
			'darkgray': '#B8B7B76E',
			'red': '#dc3232',
			'green': '#46b450',
		},
		fontFamily: {
			gtestiprodisplaylight: ['GT Eesti Pro Display Light'],
			gtestiprodisplayregular: ['GT Eesti Pro Display Regular'],
			gtestiprodisplaysemibold: ['GT Eesti Pro Display Medium'],
			gtestiprodisplaybold: ['GT Eesti Pro Display Bold'],
			gtestiprodisplayextrabold: ['GT Eesti Pro Display Extra Bold'],
			gtestiprodisplayitalic:['GT Eesti Pro Text Italic'],
			gtestitrialdisplaylight:['GT Eesti Trial Light'],
			gtestitrialdisplayregular:['GT Eesti Trial Regular'],
		},
	},
	variants: {},
	plugins: [], 
}