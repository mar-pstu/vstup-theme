( function( blocks, editor, i18n, element, components, _ ) {
	var el              = element.createElement,
		InnerBlocks     = editor.InnerBlocks,
		SelectControl   = wp.components.SelectControl,
		RichText        = editor.RichText;

	blocks.registerBlockType( 'pstu-next-theme/accordio', {
		title: i18n.__( 'Аккордеон', 'pstu-next-theme' ),
		description: i18n.__( 'PSTU Текстовый блок аналог Boootstrap блока "well".', 'pstu-next-theme' ),
		keywords: [
			i18n.__( 'ПГТУ', 'pstu-next-theme' ),
			i18n.__( 'аккордеон', 'pstu-next-theme' ),
			i18n.__( 'список', 'pstu-next-theme' ),
			i18n.__( 'контейнер', 'pstu-next-theme' ),
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
				label:i18n. __( 'Стандартный', 'pstu-next-theme' ),
				isDefault: true
			},
			{
				name: 'accordio-primary',
				label: i18n.__( 'Primary', 'pstu-next-theme' ),
				isDefault: false
			},
			{
				name: 'accordio-success',
				label: i18n.__( 'Success', 'pstu-next-theme' ),
				isDefault: false
			},
			{
				name: 'accordio-warning',
				label: i18n.__( 'Warning', 'pstu-next-theme' ),
				isDefault: false
			},
			{
				name: 'accordio-danger',
				label: i18n.__( 'Danger', 'pstu-next-theme' ),
				isDefault: false
			},
			{
				name: 'accordio-info',
				label: i18n.__( 'Info', 'pstu-next-theme' ),
				isDefault: false
			},
		],

		edit: function( props ) {
			return el( 'div', { className: 'accordio ' + props.className, 'role': 'list' },
				el( wp.editor.InspectorControls, null,
					el( wp.components.PanelBody,
						{
							title: i18n.__( 'Уровень заголовка', 'pstu-next-theme' ),
							initialOpen: true
						},
						el( SelectControl, {
							value: props.attributes.level,
							options: [
								{ value: 'h2', label: i18n.__( 'Заголовок 2', 'pstu-next-theme' ) },
								{ value: 'h3', label: i18n.__( 'Заголовок 3', 'pstu-next-theme' ) },
								{ value: 'h4', label: i18n.__( 'Заголовок 4', 'pstu-next-theme' ) },
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














// ( function( blocks, editor, i18n, element, components, _ ) {
// 	var el            = element.createElement;
// 	var RichText      = editor.RichText;
// 	var MediaUpload   = editor.MediaUpload;
// 	var SelectControl = wp.components.SelectControl;
// 	var InnerBlocks   = editor.InnerBlocks;
// 	var BlockControls = wp.editor.BlockControls;
// 	var AlignmentToolbar = wp.editor.AlignmentToolbar;

// 	blocks.registerBlockType( 'pstu-next-theme/accordio', {
// 		title: i18n.__( '"Аккордеон"', 'pstu-next-theme' ),
// 		description: i18n.__( 'Список в виде раскрывающихся панелей', 'pstu-next-theme' ),
// 		keywords: [
// 			i18n.__( 'ПГТУ', 'pstu-next-theme' ),
// 			i18n.__( 'аккордеон', 'pstu-next-theme' ),
// 			i18n.__( 'список', 'pstu-next-theme' ),
// 			i18n.__( 'контейнер', 'pstu-next-theme' ),
// 		],
// 		icon: 'editor-justify',
// 		category: 'layout',
// 		// supports: {
// 		// 	customClassName: false,
// 		// 	html: false,
// 		// },
// 		attributes: {
// 			level: {
// 				type: 'string',
// 				source: 'attribute',
// 				selector: '.accordio-heading-thumbnail img',
// 				attribute: 'data-heading',
// 				default: 'h2',
// 			},
// 			alignment: {
//       type: 'string',
//     },
// 		},

// 		// styles: [
//   //           {
//   //               name: 'well-default',
//   //               label:i18n. __( 'Стандартный', 'pstu-next-theme' ),
//   //               isDefault: true
//   //           },
//   //           {
//   //               name: 'well-sm',
//   //               label: i18n.__( 'Мини', 'pstu-next-theme' ),
//   //               isDefault: false
//   //           },
//   //           {
//   //               name: 'well-primary',
//   //               label: i18n.__( 'Primary', 'pstu-next-theme' ),
//   //               isDefault: false
//   //           },
//   //           {
//   //               name: 'well-success',
//   //               label: i18n.__( 'Success', 'pstu-next-theme' ),
//   //               isDefault: false
//   //           },
//   //           {
//   //               name: 'well-warning',
//   //               label: i18n.__( 'Warning', 'pstu-next-theme' ),
//   //               isDefault: false
//   //           },
//   //           {
//   //               name: 'well-danger',
//   //               label: i18n.__( 'Danger', 'pstu-next-theme' ),
//   //               isDefault: false
//   //           },
//   //           {
//   //               name: 'well-info',
//   //               label: i18n.__( 'Info', 'pstu-next-theme' ),
//   //               isDefault: false
//   //           },
//   //       ],
		
// 		// styles: [
// 		// 	{
// 		// 		name: 'accordio-default',
// 		// 		label:i18n. __( 'Стандартный', 'pstu-next-theme' ),
// 		// 		isDefault: false
// 		// 	},
// 			// {
// 			// 	name: 'accordio-primary',
// 			// 	label: i18n. __( 'Primary', 'pstu-next-theme' ),
// 			// 	isDefault: true
// 			// },
// 			// {
// 			// 	name: 'accordio-success',
// 			// 	label:i18n. __( 'Success', 'pstu-next-theme' ),
// 			// 	isDefault: false
// 			// },
// 			// {
// 			// 	name: 'accordio-warning',
//    //              label:i18n. __( 'Warning', 'pstu-next-theme' ),
//    //              isDefault: false
// 			// },
// 			// {
// 			// 	name: 'accordio-danger',
//    //              label:i18n. __( 'Danger', 'pstu-next-theme' ),
//    //              isDefault: false
// 			// },
// 			// {
// 			// 	name: 'accordio-info',
//    //              label:i18n. __( 'Info', 'pstu-next-theme' ),
//    //              isDefault: false
// 			// },
// 		// ],

// 		edit: function( props ) {
// 			var alignment = props.attributes.alignment;
// 			function onChangeAlignment( newAlignment ) {
//       props.setAttributes( { alignment: newAlignment } );
//     }
// 			return el( 'div', { className: 'accordio ' + props.className, 'role': 'list' },
// 				el(
// 			        BlockControls,
// 			        { key: 'controls' },
// 			        el(
// 			          AlignmentToolbar,
// 			          {
// 			            value: alignment,
// 			            onChange: onChangeAlignment
// 			           }
// 			        )
// 			      ),
// 				el( editor.InnerBlocks, {} ),
// 			);
// 		},
// 		save: function( props ) {
// 			return el( 'div', { className: 'accordio', 'data-heading': props.attributes.level },
// 				el( InnerBlocks.Content, null )
// 			);
// 		},
// 	} );

// } )(
// 	window.wp.blocks,
// 	window.wp.editor,
// 	window.wp.i18n,
// 	window.wp.element,
// 	window.wp.components,
// 	window._,
// );