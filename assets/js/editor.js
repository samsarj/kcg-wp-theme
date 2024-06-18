wp.domReady(() => {
    wp.blocks.registerBlockStyle('core/button', {
        name: 'custom-button-style',
        label: 'Custom Button Style',
        isDefault: true,
    });
});
