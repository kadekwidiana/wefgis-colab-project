<script>
  // LAYER DATA AREA
  var layerGroups = {};
  var dataLu_id = [];
  // loop data water untuk mendapatkan lu_id yang angkan di tampung di datLu_id
  @foreach ($waters as $water)
    var lu_id = [<?php echo implode(", ", $water->lu_id); ?>];
    // display marker dan polygon
    lu_id.forEach(function(luId) {
      // tambahkan lu id ke dalam array
      if (!dataLu_id.includes(luId)) {
        dataLu_id.push(luId);
      }
    });
  @endforeach
  @foreach ($resultFormatted as $water)
    //console.log({{ $water->landuse_id }})
  @endforeach

  // data landUse
  @foreach ($landUses as $landUse)
    // Membuat layerGroup baru untuk setiap landUse
    layerGroups[{{ $landUse->lu_id }}] = L.layerGroup();
    // kondisi untuk get elemen berdasarkan dataLu_id yang ada
    if (dataLu_id.includes({{ $landUse->lu_id }})) {
      document.getElementById('checkboxId_lu{{ $landUse->lu_id }}').addEventListener('change', function() {
        var luId = {{ $landUse->lu_id }};
        if (this.checked) {
          map.addLayer(layerGroups[luId]);
        } else {
          map.removeLayer(layerGroups[luId]);
        }
      });
    }
  @endforeach

  // data dinamis waters
  @foreach ($resultFormatted as $water)
    var lu_id = [<?php echo implode(", ", $water->lu_id); ?>];
    // display marker dan polygon
    lu_id.forEach(function(luId) {
      // display marker
      var imageUrl = 'https://img.icons8.com/plasticine/100/building.png';
      var customIcon = L.icon({
        iconUrl: '{{ $water->icon }}',
        iconSize: [32, 32], // Sesuaikan dengan ukuran gambar Anda
        iconAnchor: [16, 32], // Pusat bawah ikon
        popupAnchor: [0, -32] // Posisi popup relatif terhadap ikon
      });

      L.marker([{{ $water->latitude }}, {{ $water->longitude }}], {
          icon: customIcon
        })
        .addTo(layerGroups[luId])
        .bindPopup(`
    <strong>{{ $water->name }}</strong><br>
    Land Use: {{ $water->landuse }}<br>
    Land Cover: {{ $water->landCover->landcover }}<br>
    Address: {{ $water->address }}<br>
    Ownership: {{ $water->ownership }}<br>
    <center><img src="{{ asset("storage/" . $water->photo) }}" alt="Water Photo" style="max-width: 100%; max-height: 150px;"></center>
`);

      // display polygon
      L.geoJSON({!! $water->aoi !!}, {
        style: function(feature) {
          return {
            color: 'green', // warna garis polygon
            weight: 2, // ketebalan garis polygon
            opacity: 1 // opasitas garis polygon
          };
        },
      }).addTo(layerGroups[luId]);
    });
  @endforeach
  //console.log('{{ $waters }}')
</script>
