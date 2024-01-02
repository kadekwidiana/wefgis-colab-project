<script>
    // WMS GEOSERVER
    // func for display layer wms and control
    function layerWmsAndControl(urlWms, layerName, attr, chkbxId) {
        // layer WMS to map
        const wmsLayer = L.tileLayer.wms(urlWms, {
            layers: layerName, // name layer
            format: 'image/png',
            attribution: attr,
            transparent: true,
        });

        document.getElementById(chkbxId).addEventListener('change', function() {
            if (this.checked) {
                map.addLayer(wmsLayer);
            } else {
                map.removeLayer(wmsLayer);
            }
        });
    }
    // data spatial from geoserver
    @foreach ($spatials as $item)
        // console.log('{{ $item->url }}');
        layerWmsAndControl('{{ $item->url }}', '{{ $item->name }}', '{{ $item->attribute }}',
            'checkboxId{{ $item->sp_id }}')
    @endforeach
</script>
