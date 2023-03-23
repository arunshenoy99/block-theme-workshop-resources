import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';

registerBlockType( 'blocktheme/slideshow', {
	title: 'Slide Show',
	supports: {
		align: [ 'full' ],
	},
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
		<div
			id="mycarousel"
			className="carousel slide carousel-fade d-none d-md-block"
			data-ride="carousel"
		>
			<div className="carousel-inner d-none d-md-block" role="listbox">
				<div className="row align-self-center">
					<div className="col-12 text-center">
						<p className="text-secondary">Add more slides here</p>
					</div>
				</div>
				<InnerBlocks
					allowedBlocks={ [ 'blocktheme/slide' ] }
				></InnerBlocks>
			</div>
		</div>
	);
}

function save() {
	return <InnerBlocks.Content />;
}
