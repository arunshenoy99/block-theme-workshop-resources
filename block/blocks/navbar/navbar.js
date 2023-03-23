import { registerBlockType } from '@wordpress/blocks';
import { store as coreStore } from '@wordpress/core-data';
import { useSelect } from '@wordpress/data';
import { useEffect, useState } from '@wordpress/element';

registerBlockType( 'blocktheme/navbar', {
	title: 'Navbar',
	attributes: {
		align: {
			type: 'string',
			default: 'full',
		},
		links: {
			type: 'array',
		},
		siteTitle: {
			type: 'string',
		},
	},
	edit,
	save,
} );

function edit() {
	const [ links, setLinks ] = useState( [] );
	const [ siteTitle, setSiteTitle ] = useState();
	const { getEntityRecords, getEditedEntityRecord } = useSelect(
		( select ) => {
			return select( coreStore );
		}
	);

	const isLoading = useSelect( ( select ) => {
		return select( 'core/data' ).isResolving(
			coreStore,
			'getEntityRecords',
			[ 'postType', 'page' ]
		);
	} );

	const populateLinks = async () => {
		const pages = getEntityRecords( 'postType', 'page' );
		const siteTitle = getEditedEntityRecord( 'root', 'site' ).title;
		setLinks( pages?.map( ( page ) => page.title.raw ) );
		setSiteTitle( siteTitle );
	};

	useEffect( () => {
		if ( ! isLoading ) {
			populateLinks();
		}
	}, [ isLoading ] );

	return (
		<>
			<nav className="navbar navbar-dark navbar-expand-md">
				<div className="container">
					<button
						type="button"
						className="navbar-toggler"
						data-toggle="collapse"
						data-target="#navbar"
					>
						<span className="navbar-toggler-icon"></span>
					</button>
					<a className="navbar-brand" href="#">
						{ siteTitle }
					</a>
					{ links && (
						<div className="collapse navbar-collapse" id="navbar">
							<ul className="navbar-nav mr-auto">
								{ links.map( ( link, index ) => {
									return (
										<li key={ index } className="nav-item">
											<a className="nav-link">{ link }</a>
										</li>
									);
								} ) }
							</ul>
						</div>
					) }
				</div>
			</nav>
		</>
	);
}

function save() {
	return null;
}
