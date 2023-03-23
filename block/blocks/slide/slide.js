import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';

registerBlockType( 'blocktheme/slide', {
	title: 'Slide',
	supports: { align: [ 'full' ] },
	attributes: {
		align: {
			type: 'string',
			default: 'full',
		},
	},
	edit,
	save,
} );

function edit() {
	return (
		<>
			<div
				className="container-fluid"
				style={ { backgroundColor: 'var(--wp--preset--color--base)' } }
			>
				<div className="row row-content">
					<div className="col-12 text-center">
						<InnerBlocks
							allowedBlocks={ [
								'core/heading',
								'core/paragraph',
							] }
						/>
					</div>
				</div>
			</div>
		</>
	);
}

function save() {
	return <InnerBlocks.Content />;
}
