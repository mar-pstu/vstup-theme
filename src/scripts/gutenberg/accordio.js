( function( blocks, editor, i18n, element, components, _ ) {
	var el              = element.createElement,
		InnerBlocks     = editor.InnerBlocks,
		SelectControl   = wp.components.SelectControl,
		RichText        = editor.RichText;

	blocks.registerBlockType( 'pstu/accordio', {
		title: i18n.__( 'Аккордеон', 'pstu-vstup' ),
		description: i18n.__( 'PSTU Текстовый блок аналог Boootstrap блока "well".', 'pstu-vstup' ),
		keywords: [
			i18n.__( 'ПГТУ', 'pstu-vstup' ),
			i18n.__( 'аккордеон', 'pstu-vstup' ),
			i18n.__( 'список', 'pstu-vstup' ),
			i18n.__( 'контейнер', 'pstu-vstup' ),
		],
		icon: 'editor-justify',
		category: 'layout',
		
		attributes: {
			level: {
				type: 'string',
				source: 'attribute',
				selector: '.accordio',
				attribute: 'data-heading',
				default: 'h2',
			},
		},

		supports: {
			customClassName: true,
			html: false,
		},

		styles: [
			{
				name: 'accordio-default',
				label:i18n. __( 'Стандартный', 'pstu-vstup' ),
				isDefault: true
			},
			{
				name: 'accordio-primary',
				label: i18n.__( 'Primary', 'pstu-vstup' ),
				isDefault: false
			},
			{
				name: 'accordio-success',
				label: i18n.__( 'Success', 'pstu-vstup' ),
				isDefault: false
			},
			{
				name: 'accordio-warning',
				label: i18n.__( 'Warning', 'pstu-vstup' ),
				isDefault: false
			},
			{
				name: 'accordio-danger',
				label: i18n.__( 'Danger', 'pstu-vstup' ),
				isDefault: false
			},
			{
				name: 'accordio-info',
				label: i18n.__( 'Info', 'pstu-vstup' ),
				isDefault: false
			},
		],

		edit: function( props ) {
			return el( 'div', { className: 'accordio ' + props.className, 'role': 'list' },
				el( wp.editor.InspectorControls, null,
					el( wp.components.PanelBody,
						{
							title: i18n.__( 'Уровень заголовка', 'pstu-vstup' ),
							initialOpen: true
						},
						el( SelectControl, {
							value: props.attributes.level,
							options: [
								{ value: 'h2', label: i18n.__( 'Заголовок 2', 'pstu-vstup' ) },
								{ value: 'h3', label: i18n.__( 'Заголовок 3', 'pstu-vstup' ) },
								{ value: 'h4', label: i18n.__( 'Заголовок 4', 'pstu-vstup' ) },
							],
							onChange: function( value ) {
								props.setAttributes( { level: value } )
							}
						} ),
					),
				),
				( 'undefined' !== typeof props.insertBlocksAfter ) ? el( editor.InnerBlocks, {
					template: [
						[ 'core/heading', {} ],
						[ 'core/paragraph', {} ],
					],
				} ) : el( 'div' )
			);
		},

		save: function( props ) {
			return el( 'div', { className: 'accordio', 'data-heading': props.attributes.level },
				el( InnerBlocks.Content, null )
			);
		},

	} );

} )(
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components,
	window._,
);