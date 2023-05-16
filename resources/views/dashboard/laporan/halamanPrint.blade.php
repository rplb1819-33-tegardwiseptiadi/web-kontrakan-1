<html>
<head>
	<title>PRINT LAPORAN TRANSAKSI</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<style type="text/css">

        .lunas{
            background-color:green;
            color:white;
        }
        .belumlunas{
            background-color:red;
            color:white;
            /* color:red; */
        }
		body {
			font-family: "Arial";
		}
		
		/* Table */
		table {
			margin: auto;
			font-family: "Arial";
			font-size: 12px;

		}
		.table {
			border-collapse: collapse;
			font-size: 13px;
		}
		.table th, 
		.table td {
			border-bottom: 1px solid #cccccc;
			border-left: 1px solid #cccccc;
			padding: 9px 21px;
		}
		.table th, 
		.table td:last-child {
			border-right: 1px solid #cccccc;
		}
		.table td:first-child {
			border-top: 1px solid #cccccc;
		}
		caption {
			caption-side: top;
			margin-bottom: 10px;
			font-size: 16px;
		}
		
		/* Table Header */
		.table thead th {
			background-color: #2ECD71;
			color: #FFFFFF;
		}
		
		/* Table Body */
		.table tbody td {
			color: #353535;
		}
		.table tbody tr:nth-child(odd) td {
			background-color: #f5fff9;
		}
		.table tbody tr:hover th,
		.table tbody tr:hover td {
			background-color: #f0f0f0;
			transition: all .2s;
		}

		.text-center {
			text-align: center;
		}

		/*Tabel Responsive 1*/
		.table-container {
			overflow: auto;
		}

		@media screen and (max-width: 520px) {
			/*Tabel Responsive 2*/
			.responsive-2 {
				width: 100%;
			}
			.responsive-2 thead {
				display: none;
			}
			.responsive-2 td {
				display: block;
				text-align: right;
				border-right: 1px solid #e1edff;
			}
			.responsive-2 td::before {
				float: left;
				text-transform: uppercase;
				font-weight: bold;
				content: attr(data-header);
			}

			/*Tabel Responsive 3*/
			.responsive-3 {
				width: 100%;
			}
			.responsive-3 thead th.column-primary {
				width: 100%;
			}

			.responsive-3 thead th:not(.column-primary) {
				display:none;
			}
			
			.responsive-3 td {
				display: block;
				width: auto;
				text-align: right;
				border-right: 1px solid #e1edff;
			}
			.responsive-3 thead th::before {
				text-transform: uppercase;
				font-weight: bold;
				content: attr(data-header);
			}
			.responsive-3 thead th:first-child span {
				display: none;
			}
			.responsive-3 td::before {
				float: left;
				text-transform: uppercase;
				font-weight: bold;
				content: attr(data-header);
			}
		}
	</style>
</head>
<body>
	 
	<table class="table responsive-3">
		<h3 class="text-center">
			PRINT LAPORAN TRANSAKSI BULANAN  
			<br>
			{{\Carbon\Carbon::parse($tglawal)->format('l\, d-m-Y ') }}
			S/D
			{{\Carbon\Carbon::parse($tglakhir)->format('l\, d-m-Y ') }}
             </h3> 
		<thead>
			<tr> 
                <th scope="col">No.</th>
                <th scope="col">ID Transaksi</th>
                <th scope="col">Nama Penghuni</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Status Penghuni</th> 
                <th scope="col">Nama Kontrakan</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Nominal</th>
                <th scope="col">Status Transaksi</th> 
		</thead>
		<tbody>
			@if (count($cetakPertanggal) > 0)                       
                @foreach ($cetakPertanggal as $print)
                    <tr align="center">
                        <td  style="vertical-align:middle;">{{ $loop->iteration }}</td>
                        <td  style="vertical-align:middle;">TR-{{ $print->id }}</td>
                        <td  style="vertical-align:middle;">{{ $print->occupants->nama_penghuni }}</td>
                        <td  style="vertical-align:middle;">{{ $print->occupants->jenis_kelamin_penghuni }}</td>
                        <td  style="vertical-align:middle;">{{ $print->occupants->status_penghuni }}</td>
                        <td  style="vertical-align:middle;">{{ $print->rents->nama_kontrakan }}</td>
                        <td  style="vertical-align:middle;">{{ $print->tgl_transaksi }}</td>
                        <td  style="vertical-align:middle;">{{ $print->nominal }} </td>
                        <td  style="vertical-align:middle;">
                            @if($print->status_transaksi == 'Lunas')
                                <div class="lunas"> {{ $print->status_transaksi }}
                            @endif                                

                            @if($print->status_transaksi == 'Belum Lunas')
                                <div class="belumlunas"> {{ $print->status_transaksi }}
                            @endif

                            
                        </td>
                    </tr>                  
                @endforeach
				@else
					<tr align="center">
							<td colspan="9"> 
								<p style="font-size:30px">DATA LAPORAN TRANSAKSI TIDAK ADA</p>
								<p style="font-size:30px">PASTIKAN ANDA MENGINPUT TANGGAL</p>
								<p style="font-size:30px">LAPORAN TRANSAKSI YANG ADA</p>
							</td>
					</tr>
				@endif
		 
		</tbody>
	</table>
        <!-- SCRIPT UNTUK PRINT -->
        <script type="text/javascript">
    window.print();
    </script>
</body>
</html>