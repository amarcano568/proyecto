<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="{{ asset('css/bootstrap4.css') }}" rel="stylesheet" />
</head>
<body>
<header>
	<style>
            /** Define the margins of your page **/
            @page {
                margin: 100px 25px;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/

                color: black;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }
        </style>

        <header>

        	<table id="tableGestorIncidencias"  style="width: 100%">
				<thead>
					<tr>
						<th style="text-align: center;">
							<img src="{{ asset('Empresas/'.$carpeta.'/'.$empresa->logo)}}" width="125" height="80">
						</th>
						<th style="text-align: center;">
							{{ $empresa->razonSocial }}
						</th>
						<th style="text-align: center;">
							<h5>{{$fecha->format('d-m-Y')}}</h5>
						</th>
						<th style="text-align: center;">
							<img src="{{ asset('Empresas/'.$carpeta.'/'.$empresa->logo)}}" width="125" height="80">
						</th>
						<th style="text-align: center;">
							{{ $empresa->razonSocial }}
						</th>
						<th style="text-align: center;">	
							<h5>{{$fecha->format('d-m-Y')}}</h5>
						</th>    
					</tr>
				</thead>
				<tbody >
				<tr>
					@foreach($medicinas as $medicinas)
        			{
						<td>
							{{ $medicinas->medicamentos->nombre.' '.$medicinas->medicamentos->concentrado }}
							<br>
							{{ $medicinas->medicamentos->tipo1 }}
							<br>
							{{ $medicinas->indicaciones }}
						</td>

					@endforeach

				</tr>				    	
		    </tbody>
			</table>
			<hr>

        </header>

        <footer>
            Copyright &copy; <?php echo date("Y");?> 
        </footer>
		<br><br><br>
        <table style="width: 100%">
        	<thead>
        	</thead>
		    
	    </table>
	
	

</header>
</body>
</html>