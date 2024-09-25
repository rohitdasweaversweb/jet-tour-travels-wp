(function(wp){
var el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType,
    withSelect = wp.data.withSelect,
    BlockControls = wp.editor.BlockControls,
    AlignmentToolbar = wp.editor.AlignmentToolbar,
    InspectorControls = wp.blocks.InspectorControls,
    ServerSideRender = wp.components.ServerSideRender,
    __ = wp.i18n.__,
    Text = wp.components.TextControl,
    aysSelect = wp.components.SelectControl,
    createBlock = wp.blocks.createBlock,
    select = wp.data.select,
    dispatch = wp.data.dispatch;

var iconEl = el(
        'svg', 
        { 
            xmlns: 'http://www.w3.org/2000/svg',
            width: 50,
            height: 50,
            viewBox: '0 0 130 130'
        },        
        el(
            'path',
            { 
                d: "M 72.5,4.5 C 72.4431,5.60895 72.1098,6.60895 71.5,7.5C 55.8298,7.33341 40.1631,7.50008 24.5,8C 16.9211,9.90811 11.4211,14.4081 8,21.5C 6.15533,29.8714 4.98867,38.2047 4.5,46.5C 4.12411,37.7646 4.62411,29.0979 6,20.5C 9.43746,12.0615 15.6041,6.89487 24.5,5C 40.4965,4.50007 56.4965,4.33341 72.5,4.5 Z",
                fill: '#b8d7e6'
            }
        ),
        el(
            'path',
            { 
                d: "M 72.5,4.5 C 80.5,4.5 88.5,4.5 96.5,4.5C 95.8333,5.5 95.1667,6.5 94.5,7.5C 94.1667,7.5 93.8333,7.5 93.5,7.5C 90.8333,7.5 88.1667,7.5 85.5,7.5C 80.8333,7.5 76.1667,7.5 71.5,7.5C 72.1098,6.60895 72.4431,5.60895 72.5,4.5 Z",
                fill: '#d5ddcb'
            }
        ),
        el(
            'path',
            { 
                d: "M 106.5,5.5 C 116.994,7.99489 123.994,14.3282 127.5,24.5C 127.5,52.1667 127.5,79.8333 127.5,107.5C 124.5,117.833 117.833,124.5 107.5,127.5C 79.8333,127.5 52.1667,127.5 24.5,127.5C 12.7096,123.366 6.04289,115.033 4.5,102.5C 6.7243,111.233 12.0576,117.4 20.5,121C 34.0934,122.446 47.76,122.946 61.5,122.5C 75.8372,122.667 90.1705,122.5 104.5,122C 112.891,119.774 118.558,114.607 121.5,106.5C 122.324,103.236 122.658,99.9023 122.5,96.5C 122.5,82.8333 122.5,69.1667 122.5,55.5C 122.5,47.5 122.5,39.5 122.5,31.5C 122.755,19.3356 117.422,10.669 106.5,5.5 Z",
                fill: '#010100'
            }
        ),
        el(
            'path',
            { 
                d: "M 71.5,7.5 C 69.253,15.7127 68.9197,24.0461 70.5,32.5C 67.4816,32.6646 64.4816,32.498 61.5,32C 58.3939,30.3635 55.2272,28.8635 52,27.5C 49.8462,28.3204 48.3462,29.8204 47.5,32C 42.8333,32.3333 38.1667,32.6667 33.5,33C 32.5251,38.7412 32.1918,44.5746 32.5,50.5C 27.2835,52.3629 22.7835,55.3629 19,59.5C 13.3868,67.0652 8.55349,75.0652 4.5,83.5C 4.5,71.1667 4.5,58.8333 4.5,46.5C 4.98867,38.2047 6.15533,29.8714 8,21.5C 11.4211,14.4081 16.9211,9.90811 24.5,8C 40.1631,7.50008 55.8298,7.33341 71.5,7.5 Z",
                fill: '#7cb5d1'
            }
        ),
        el(
            'path',
            { 
                d: "M 71.5,7.5 C 76.1667,7.5 80.8333,7.5 85.5,7.5C 80.5847,15.6522 80.2513,23.9855 84.5,32.5C 79.8333,32.5 75.1667,32.5 70.5,32.5C 68.9197,24.0461 69.253,15.7127 71.5,7.5 Z",
                fill: '#a0b8a6'
            }
        ),
        el(
            'path',
            { 
                d: "M 85.5,7.5 C 88.1667,7.5 90.8333,7.5 93.5,7.5C 86.5361,15.3228 85.8694,23.6562 91.5,32.5C 89.1667,32.5 86.8333,32.5 84.5,32.5C 80.2513,23.9855 80.5847,15.6522 85.5,7.5 Z",
                fill: '#b1bb91'
            }
        ),
        el(
            'path',
            { 
                d: "M 93.5,7.5 C 93.8333,7.5 94.1667,7.5 94.5,7.5C 111.065,7.06809 120.065,15.0681 121.5,31.5C 121.5,31.8333 121.5,32.1667 121.5,32.5C 115.79,38.9583 108.79,40.9583 100.5,38.5C 97.7633,38.1408 95.7633,36.8075 94.5,34.5C 94.0269,33.0937 93.0269,32.427 91.5,32.5C 85.8694,23.6562 86.5361,15.3228 93.5,7.5 Z",
                fill: '#e8c050'
            }
        ),
        el(
            'path',
            { 
                d: "M 96.5,4.5 C 99.9387,4.25293 103.272,4.58627 106.5,5.5C 117.422,10.669 122.755,19.3356 122.5,31.5C 122.167,31.5 121.833,31.5 121.5,31.5C 120.065,15.0681 111.065,7.06809 94.5,7.5C 95.1667,6.5 95.8333,5.5 96.5,4.5 Z",
                fill: '#e4d096'
            }
        ),
        el(
            'path',
            { 
                d: "M 70.5,32.5 C 75.1667,32.5 79.8333,32.5 84.5,32.5C 86.8333,32.5 89.1667,32.5 91.5,32.5C 93.0269,32.427 94.0269,33.0937 94.5,34.5C 94.1818,39.0323 94.5151,43.3656 95.5,47.5C 99.2168,49.1088 102.717,51.1088 106,53.5C 106.122,55.2816 105.622,56.9482 104.5,58.5C 102.444,62.3328 100.778,66.3328 99.5,70.5C 98.1077,72.2726 96.941,74.2726 96,76.5C 95.6667,81.8333 95.3333,87.1667 95,92.5C 94.6924,93.3081 94.1924,93.9747 93.5,94.5C 91.3432,95.0505 89.3432,95.7171 87.5,96.5C 85.2742,99.9446 83.2742,103.611 81.5,107.5C 80.6667,107.833 79.8333,108.167 79,108.5C 69.679,104.724 60.5123,100.557 51.5,96C 46.1771,95.5006 40.8437,95.334 35.5,95.5C 34.5416,95.0472 33.7083,94.3805 33,93.5C 32.6667,91.5 32.3333,89.5 32,87.5C 29.913,86.2062 27.7463,85.0395 25.5,84C 24.9781,83.4387 24.6448,82.772 24.5,82C 26.8478,76.8032 29.3478,71.6365 32,66.5C 32.4994,61.1771 32.666,55.8437 32.5,50.5C 32.1918,44.5746 32.5251,38.7412 33.5,33C 38.1667,32.6667 42.8333,32.3333 47.5,32C 48.3462,29.8204 49.8462,28.3204 52,27.5C 55.2272,28.8635 58.3939,30.3635 61.5,32C 64.4816,32.498 67.4816,32.6646 70.5,32.5 Z",
                fill: '#fcfdfc'
            }
        ),
        el(
            'path',
            { 
                d: "M 121.5,32.5 C 123.045,39.5015 120.379,43.6681 113.5,45C 111.19,45.4966 108.857,45.6633 106.5,45.5C 106.167,45.5 105.833,45.5 105.5,45.5C 103.42,43.4268 101.754,41.0934 100.5,38.5C 108.79,40.9583 115.79,38.9583 121.5,32.5 Z",
                fill: '#b1ba91'
            }
        ),
        el(
            'path',
            { 
                d: "M 72.5,36.5 C 76.1884,44.8551 82.1884,50.8551 90.5,54.5C 90.5,59.5 90.5,64.5 90.5,69.5C 81.5496,70.1404 74.5496,74.1404 69.5,81.5C 68.1667,81.5 66.8333,81.5 65.5,81.5C 60.5943,72.0223 54.9277,63.0223 48.5,54.5C 45.1825,51.174 41.1825,49.5074 36.5,49.5C 36.203,45.2325 36.5363,41.0659 37.5,37C 49.1619,36.5001 60.8286,36.3335 72.5,36.5 Z",
                fill: '#7eb5d2'
            }
        ),
        el(
            'path',
            { 
                d: "M 72.5,36.5 C 78.5,36.5 84.5,36.5 90.5,36.5C 90.5,42.5 90.5,48.5 90.5,54.5C 82.1884,50.8551 76.1884,44.8551 72.5,36.5 Z",
                fill: '#a2baa8'
            }
        ),
        el(
            'path',
            { 
                d: "M 94.5,34.5 C 95.7633,36.8075 97.7633,38.1408 100.5,38.5C 101.754,41.0934 103.42,43.4268 105.5,45.5C 102.117,45.7428 98.9508,45.0761 96,43.5C 95.51,44.7932 95.3433,46.1266 95.5,47.5C 94.5151,43.3656 94.1818,39.0323 94.5,34.5 Z",
                fill: '#8e9474'
            }
        ),
        el(
            'path',
            { 
                d: "M 105.5,45.5 C 105.833,45.5 106.167,45.5 106.5,45.5C 109.833,49.5 113.5,53.1667 117.5,56.5C 113.433,58.0538 109.1,58.7204 104.5,58.5C 105.622,56.9482 106.122,55.2816 106,53.5C 102.717,51.1088 99.2168,49.1088 95.5,47.5C 95.3433,46.1266 95.51,44.7932 96,43.5C 98.9508,45.0761 102.117,45.7428 105.5,45.5 Z",
                fill: '#798d81'
            }
        ),
        el(
            'path',
            { 
                d: "M 121.5,31.5 C 121.833,31.5 122.167,31.5 122.5,31.5C 122.5,39.5 122.5,47.5 122.5,55.5C 120.883,56.038 119.216,56.3713 117.5,56.5C 113.5,53.1667 109.833,49.5 106.5,45.5C 108.857,45.6633 111.19,45.4966 113.5,45C 120.379,43.6681 123.045,39.5015 121.5,32.5C 121.5,32.1667 121.5,31.8333 121.5,31.5 Z",
                fill: '#a2baaa'
            }
        ),
        el(
            'path',
            { 
                d: "M 36.5,49.5 C 41.1825,49.5074 45.1825,51.174 48.5,54.5C 54.9277,63.0223 60.5943,72.0223 65.5,81.5C 55.8333,81.5 46.1667,81.5 36.5,81.5C 36.5,70.8333 36.5,60.1667 36.5,49.5 Z",
                fill: '#99bf4b'
            }
        ),
        el(
            'path',
            { 
                d: "M 32.5,50.5 C 32.666,55.8437 32.4994,61.1771 32,66.5C 29.3478,71.6365 26.8478,76.8032 24.5,82C 24.6448,82.772 24.9781,83.4387 25.5,84C 27.7463,85.0395 29.913,86.2062 32,87.5C 32.3333,89.5 32.6667,91.5 33,93.5C 33.7083,94.3805 34.5416,95.0472 35.5,95.5C 43.2976,103.798 51.2976,111.965 59.5,120C 48.5,120.667 37.5,120.667 26.5,120C 20.2356,119.119 15.0689,116.285 11,111.5C 9.0959,107.222 6.92924,103.222 4.5,99.5C 4.5,94.1667 4.5,88.8333 4.5,83.5C 8.55349,75.0652 13.3868,67.0652 19,59.5C 22.7835,55.3629 27.2835,52.3629 32.5,50.5 Z",
                fill: '#96bd47'
            }
        ),
        el(
            'path',
            { 
                d: "M 99.5,57.5 C 97.7085,57.634 96.0418,57.3007 94.5,56.5C 94.3573,51.8827 96.024,51.216 99.5,54.5C 100.776,55.6136 100.776,56.6136 99.5,57.5 Z",
                fill: '#a8bca7'
            }
        ),
        el(
            'path',
            { 
                d: "M 94.5,56.5 C 96.0418,57.3007 97.7085,57.634 99.5,57.5C 95.1562,72.4769 93.4895,72.1436 94.5,56.5 Z",
                fill: '#92c1d9'
            }
        ),
        el(
            'path',
            { 
                d: "M 122.5,55.5 C 122.5,69.1667 122.5,82.8333 122.5,96.5C 116.263,86.5942 108.596,77.9276 99.5,70.5C 100.778,66.3328 102.444,62.3328 104.5,58.5C 109.1,58.7204 113.433,58.0538 117.5,56.5C 119.216,56.3713 120.883,56.038 122.5,55.5 Z",
                fill: '#608ba1'
            }
        ),
        el(
            'path',
            { 
                d: "M 90.5,69.5 C 90.5,73.5 90.5,77.5 90.5,81.5C 83.5,81.5 76.5,81.5 69.5,81.5C 74.5496,74.1404 81.5496,70.1404 90.5,69.5 Z",
                fill: '#58906b'
            }
        ),
        el(
            'path',
            { 
                d: "M 99.5,70.5 C 108.596,77.9276 116.263,86.5942 122.5,96.5C 122.658,99.9023 122.324,103.236 121.5,106.5C 120.833,106.167 120.167,105.833 119.5,105.5C 109.219,101.262 98.552,98.2619 87.5,96.5C 89.3432,95.7171 91.3432,95.0505 93.5,94.5C 94.1924,93.9747 94.6924,93.3081 95,92.5C 95.3333,87.1667 95.6667,81.8333 96,76.5C 96.941,74.2726 98.1077,72.2726 99.5,70.5 Z",
                fill: '#436e52'
            }
        ),
        el(
            'path',
            { 
                d: "M 35.5,95.5 C 40.8437,95.334 46.1771,95.5006 51.5,96C 60.5123,100.557 69.679,104.724 79,108.5C 79.8333,108.167 80.6667,107.833 81.5,107.5C 83.2742,103.611 85.2742,99.9446 87.5,96.5C 98.552,98.2619 109.219,101.262 119.5,105.5C 116.587,112.243 111.587,116.743 104.5,119C 89.879,120.247 75.2123,120.914 60.5,121C 61.056,121.383 61.3893,121.883 61.5,122.5C 47.76,122.946 34.0934,122.446 20.5,121C 12.0576,117.4 6.7243,111.233 4.5,102.5C 4.5,101.5 4.5,100.5 4.5,99.5C 6.92924,103.222 9.0959,107.222 11,111.5C 15.0689,116.285 20.2356,119.119 26.5,120C 37.5,120.667 48.5,120.667 59.5,120C 51.2976,111.965 43.2976,103.798 35.5,95.5 Z",
                fill: '#739236'
            }
        ),
        el(
            'path',
            { 
                d: "M 119.5,105.5 C 120.167,105.833 120.833,106.167 121.5,106.5C 118.558,114.607 112.891,119.774 104.5,122C 90.1705,122.5 75.8372,122.667 61.5,122.5C 61.3893,121.883 61.056,121.383 60.5,121C 75.2123,120.914 89.879,120.247 104.5,119C 111.587,116.743 116.587,112.243 119.5,105.5 Z",
                fill: '#5d752d'
            }
        )
    );
    
var supports = {
    customClassName: false
};

registerBlockType( 'gallery-photo-gallery/gallery', {
    title: __('Gallery - Photo Gallery'),
    category: 'common',
    icon: iconEl,
    supports: supports,
    edit: withSelect( function( select ) {
        if(select( 'core/blocks' ).getBlockType( 'gallery-photo-gallery/gallery' ).attributes.idner &&
           (select( 'core/blocks' ).getBlockType( 'gallery-photo-gallery/gallery' ).attributes.idner != undefined ||
            select( 'core/blocks' ).getBlockType( 'gallery-photo-gallery/gallery' ).attributes.idner != null ) ){
            return {
                galleries: select( 'core/blocks' ).getBlockType( 'gallery-photo-gallery/gallery' ).attributes.idner
            };
        }else{
            return {
                galleries: __( "Something goes wrong please reload page" )
            };
        }
    } )( function( props ) {

        if ( ! props.galleries ) {
            return __("Loading...");
        }
        if( typeof props.galleries != "object"){
            return props.galleries;
        }

        if ( props.galleries.length === 0 ) {
            return __("There are no gallery yet");
        }
        var status = 0;
        if(props.attributes.metaFieldValue > 0){            
            status = 1;
        }
        var galleriner = [];
        galleriner.push({ label: __("-Select Gallery-"), value: '0'});
        for(var i in props.galleries){
            var galleryData = {
                    value: props.galleries[i].id,
                    label: props.galleries[i].title,
                }
            galleriner.push(galleryData)
        }
        var aysElement = el(
            aysSelect, {
                className: 'ays_gpg_block_select',
                label: 'Select Gallery',
                value: props.attributes.metaFieldValue,
                onChange: function( content ) {
                    var c = content;
                    if(isNaN(content)){
                        c = '';
                    }
                    status = 1;
                    wp.data.dispatch( 'core/block-editor' ).updateBlockAttributes( props.clientId, {
                        shortcode: "[gallery_p_gallery  id="+c+"]",
                        metaFieldValue: parseInt(c)
                    } );
                },
                options: galleriner
            }
        );

        var aysElement2 = el(
            aysSelect, {
                className: 'ays_gpg_block_select',
                label: '',
                value: props.attributes.metaFieldValue,
                onChange: function( content ) {
                    var c = content;
                    if(isNaN(content)){
                        c = '';
                    }
                    wp.data.dispatch( 'core/block-editor' ).updateBlockAttributes( props.clientId, {
                        shortcode: "[gallery_p_gallery id="+c+"]",
                        metaFieldValue: parseInt(c)
                    } );

                },
                options: galleriner
            },            
        );
        var res = el(
            wp.element.Fragment,
            {},
            el(
                BlockControls,
                props
            ),
            el(
                wp.editor.InspectorControls,
                {},
                el(
                    wp.components.PanelBody,
                    {},
                    el(
                        "div",
                        {
                            className: 'ays_gpg_block_container',
                            key: "inspector",
                        },
                        aysElement
                    )
                )
            ),
            el(ServerSideRender, {
                key: "editable",
                block: "gallery-photo-gallery/gallery",
                attributes:  props.attributes
            }),
            el(
                "div",
                {
                    className: 'ays_gpg_block_select_gallery',
                    key: "inspector",
                },
                aysElement2
            )
        );
        var res2 = el(
            wp.element.Fragment,
            {},
            el(
                BlockControls,
                props
            ),
            el(
                wp.editor.InspectorControls,
                {},
                el(
                    wp.components.PanelBody,
                    {},
                    el(
                        "div",
                        {
                            className: 'ays_gpg_block_container',
                            key: "inspector",
                        },
                        aysElement
                    )
                )
            ),
            el(ServerSideRender, {
                key: "editable",
                block: "gallery-photo-gallery/gallery",
                attributes:  props.attributes
            })
        );
        if(status == 1){
            return res2;
        }else{
            return res;
        }
    }),

    save: function(e) {
        var t = e.attributes,
            n = t.metaFieldValue;

        resolveBlocks();

        return n ? el("div", null, '[gallery_p_gallery id="'+n+'"]') : null
    }
} );

function resolveBlocks(id){
    var blocks = id ?
        select('core/block-editor').getBlock(id).innerBlocks
        : select('core/block-editor').getBlocks();

    if ( Array.isArray(blocks) ) {
        blocks.map( function(block){
            if(block.name == 'gallery-photo-gallery/gallery'){
                if (!block.isValid) {
                    var newBlock = createBlock( block.name, block.attributes, block.innerblocks);
                    dispatch('core/block-editor').replaceBlock( block.clientId, newBlock );
                } else {
                    resolveBlocks(block.clientId)
                };
            }
        } );
    };
};

})(wp);