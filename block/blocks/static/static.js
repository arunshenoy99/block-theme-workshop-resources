import { registerBlockType } from '@wordpress/blocks';

registerBlockType( 'blocktheme/static', {
	title: 'Static Block',
	attributes: {
		text: {
			type: 'string',
		},
	},
	edit,
	save,
} );

function edit( props ) {
	function changeDynamicText( event ) {
		props.setAttributes( {
			dynamicText: event.target.value,
		} );
	}
	return (
		<>
			<input
				type="text"
				placeholder="dynamic text"
				value={ props.attributes.dynamicText }
				onChange={ changeDynamicText }
			/>
		</>
	);
}

function save( props ) {
	return <p>The dynamic text was { props.attributes.dynamicText }.</p>;
}
