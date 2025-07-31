
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Batule Industries-@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="resources/css/landing.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- jQuery (Google CDN) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     
    <style>
       *{
         margin:0;
         padding:0;
         box-sizing:border-box;
      }
  :root{
    --primary:blue;
   }
   

      /* pagination */
      svg{
         width:3% !important;
      }
      nav{
         margin-left: 40% !important;
         margin-top: 2%;
      }
      nav p{
         margin-top: 14px;
         /* margin-bottom: 1rem; */
         /* margin-left: 5%; */
      
      }
      /* nav .justify-between{
         margin-left: 4% !important;
      } */
      

    .side-bar{
        background:var(--primary);
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 10%;
   }
   body{
    background:#b0afaf;
   }
   .nav-bar{
        background: var(--primary);
        height: 55px;
        width: 88%;
        position: fixed;
        top: 0;
        left: 11%;
   }
   .body-bar{
        background: white;
        position: fixed;
        top: 9%;
        left: 11%;
        height:82%;
        width: 88%;
        overflow-y:scroll;
        padding:2%;
        z-index: -100%;
   }
    footer{
        background:  var(--primary);
        position: fixed;
        bottom:0;
        left: 11%;
        height:55px;
        width: 88%;
        right:0;
   }
   .btn1{
    padding:5px;
    color:white;
    background: var(--primary);
    border-radius:10px;
    font-size:20px;
    margin-left:32%;
    border:none;
   }
    .btn1:hover{
      background:red;
      color:white;
      /* font-size:25px; */
    }
     .nav-link{
        color: #fff;
         text-transform: uppercase;
         text-decoration: none;
         letter-spacing: 0.15em;
         display: inline-block;
         padding: 15px 10px;
         position: relative;
        }
        .nav-link.active {
            color:white; /* Bootstrap primary color */
            font-size:16px;
            border-bottom:2px solid white;
            width:100%;
        }
        .nav-link1{
        color: #fff;
         text-transform: uppercase;
         text-decoration: none;
                display: inline-block;
            padding: 16px;
            position: relative;
            top: 13%;
            height: 65px;
            border-radius: 5px;
            font-weight: bold;
        }
        .nav-link1.active {
            color:var(--primary) !important; /* Bootstrap primary color */
            font-size:16px;
            border-bottom:2px solid white;
            width:125%;
            background-color:white;
        }

        .nav-link.active:hover,
        .nav-link.active:focus {
            color: #0a58ca;
        }
        /* .nav-link:hover{
            border-bottom: 2px solid white;
            transition: all 0.2s ease;
            width:98%;
            /* position:absolute; */
            
        /* } */ 
        /* Underlined css */
        .nav-link:after {    
            background: none repeat scroll 0 0 transparent;
            bottom: 0;
            content: "";
            display: block;
            height: 2px;
            left: 50%;
            position: absolute;
            background: #fff;
            transition: width 0.3s ease 0s, left 0.3s ease 0s;
            width: 0;
            }
            .nav-link:hover:after { 
            width: 100%; 
            left: 0; 
            }
         
            /* logoutf form */
        .logoutPage{
            position: fixed;
            top: 6%;
            right: 3%;
            width: 12%;
            height: 33%;
            border-radius: 10px;
            background:white;
            /* box-shadow: 2px 2px 1px rgba(0,0,0,.4); */
            display:none;
        }
        #cancel{
         margin-left: 90%; 
         border-radius: 8px;
         padding: 0px 6px;
         font-size: 18px;
         position: fixed;
         right: 50px;
         top:45px;
         border:none;
        }
        .img1{
        border-radius: 50%;
         width: 40%;
         margin-left: 29%;
         margin-top: 12%;
        }
         .search{
          margin-left: 61%;
         padding: 1%;
         margin-top: 3%;
         border-radius: 15px;
       }

  
      .dropdown .nav-link:after {
         background: none; 
         bottom: 0;
         content: "";
         display:block;
         height: none;
         left: 130%;
         top:50%;
         position: absolute;
         background: #none;
         transition:none;
         width: 0;
    }
       
    </style>
    </head>
<body>
     <div class="container-fluid">
        <div class="row">
            <div class="col-2 side-bar">
             
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mt-4">
                            <a class="navbar-brand text-light "  style="font-size: 23px; margin-left: 10px;" href="{{route('dashboard')}}">BATULE <br>INDUSTRIES</a>
                        </li>
                         
                         <li class="nav-item mt-3">
                           <a class='nav-link @yield("active-dashboard") text-light' aria-current="page"  style="margin-right:25px" href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                           <a class='nav-link @yield("active-user") text-light' aria-current="page"  style="margin-right:25px" href="{{route('user')}}">Users</a>
                        </li>
                        <li class="nav-item">
                           <a class='nav-link @yield("active-company") text-light' style="margin-right:25px" href="{{route('company')}}">Company</a>
                        </li>
                         <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle text-light" href="{{route('sale')}}" id="navbarDropdown"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               Sale
                           </a>
                           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item @yield('active-dashboard')" href="{{route('sale')}}">Invoice Bill</a></li>
                              <li><a class="dropdown-item @yield('active-dashboard')" href="{{route('status')}}">Status</a></li>
         
                              <li><a class="dropdown-item @yield('active-dashboard')" href="{{route('payment')}}">Payment</a></li>
                           </ul>
                        </li>
                         <li class="nav-item">
                           <a class='nav-link @yield("active-purchase") text-light' style="margin-right:25px" href="{{route('purchase_order')}}">Purchase </a>
                        </li>
                         <li class="nav-item">
                           <a class='nav-link @yield("active-contact-detail") text-light' style="margin-right:25px" href="{{route('contact_detail')}}">Contact</a>
                        </li>
                         <li class="nav-item">
                           <a class='nav-link @yield("active-bank-detail") text-light' style="margin-right:25px" href="{{route('bank_detail')}}">Bank</a>
                        </li>
                       
                        <!-- <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li> -->
                        </ul>
                   
                    
            </div>
            <div class="col-10 nav-bar">
                <div class="row mt-3">
                    <div class="col">
                    </div>
                     <div class="col">
                       
                          <div class="row">
                            <div class="col">

                            </div>
                            @auth
                            <div class="col">
                                 <a class="text-light fs-xx mb-1 text-decoration-none" style="font-size: 21px;margin-left: 50%;cursor:pointer;" id="logout" onclick="logoutPage()">{{Auth::User()->name}}</a>
                            </div>
                             @endauth
                          </div>
                    </div>
                </div>
                <div class="body-bar">
                    @yield("content")
                   @auth
               <div class="logoutPage shadow-sm" id="logoutPage">
                  <a href="#" class="bg-danger text-decoration-none text-light" id="cancel" onclick="cancel()">&times;</a>
                  
                  <form action="{{ route('logout') }}" method="post">
                     @csrf

                     <a href="{{ route('update_image',Auth::user()->id) }}">
                           <img src="{{url('storage/app/private/'.Auth::user()->image) }}" alt="image" class="img1">
                     </a>

                     <h6 class="text-light fs-xx mt-1" style="font-size: 21px; margin-left: 30%; color: blue !important;">
                           Welcome <span style="margin-left:10%;">{{ Auth::user()->name }}</span>
                     </h6>

                     <input type="submit" class="btn btn-primary mt-1" style="margin-left:30%" value="Logout">
                  </form>
               </div>
               @endauth
              </div>
            </div>
        </div>
        <footer>

        </footer>
     </div>
   
       
      <script>
         function logoutPage(){
            const log = document.getElementById('logoutPage').style.display = "block";
            return log;
         }
          function cancel(){
            const log = document.getElementById('logoutPage').style.display = "none";
            return log;
         }
      </script>

   

<script>

$(document).ready(function() {
    let sellerGST = "27"; // Seller GST state code (e.g., Maharashtra)

    function updateSrNo() {
        $('#invoice-items tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    function calculateRow(row) {
        let qty = parseFloat(row.find('.quant').val()) || 0;
        let rate = parseFloat(row.find('.unitRate').val()) || 0;
        let totalTax = qty * rate;
        let gst = totalTax * 0.18;
        let totalAmount = totalTax + gst;

        row.find('.totalTax').val(totalTax.toFixed(2));
        row.find('.gst_18').val(gst.toFixed(2));
        row.find('.totalAmount').val(totalAmount.toFixed(2));
    }

    function calculateTotals() {
        let totalTaxable = 0, totalGST = 0, grandTotal = 0;

        $('#invoice-items .item-row').each(function() {
            totalTaxable += parseFloat($(this).find('.totalTax').val()) || 0;
            totalGST += parseFloat($(this).find('.gst_18').val()) || 0;
            grandTotal += parseFloat($(this).find('.totalAmount').val()) || 0;
        });

        $('.totalTaxable').val(totalTaxable.toFixed(2));
        $('.totalAmt').val(grandTotal.toFixed(2));

        let buyerGST = $('#gstNo').val() ||  '';
        let buyerState = buyerGST.substring(0, 2);

        if (buyerState && buyerState === sellerGST) {
            $('.cgst').val((totalGST / 2).toFixed(2));
            $('.sgst').val((totalGST / 2).toFixed(2));
            $('.igst').val(0);
        } else {
            $('.cgst').val(0);
            $('.sgst').val(0);
            $('.igst').val(totalGST.toFixed(2));
        }
    }

    $('#add-item').click(function() {
         let newRow = $('#invoice-items .item-row:first').clone();
        newRow.find('textarea, input').each(function() {
            $(this).val('');
        });
        newRow.find('.quant').val(1);
        newRow.find('.unitRate').val(100.00);
        newRow.find('.totalTax').val();
        newRow.find('.gst_18').val();
        newRow.find('.totalAmount').val();
        $('#invoice-items').append(newRow);
        updateSrNo();
    
    });

    $(document).on('click', '.remove-item', function() {
        if ($('#invoice-items .item-row').length > 1) {
            $(this).closest('tr').remove();
            updateSrNo();
            calculateTotals();
        } else {
            alert('At least one row is required.');
        }
    });

    // Input events
    $(document).on('input', '.quant, .unitRate, #gstNo', function() {
        let row = $(this).closest('tr');
        if (row.hasClass('item-row')) calculateRow(row);
        calculateTotals();
    });

    // Company dropdown AJAX
    $('#company').on('change', function () {
        let companyId = $(this).val();
        if (companyId != 0) {
            $.ajax({
                url: "{{ url('get-company') }}/" + companyId,
                type: 'GET',
                success: function (response) {
                    if (response.status) {
                        let data = response.data;

                        $('#showCompanyName').text(data.company_name);
                        $('#showCompanyEmail').text(data.company_email);
                        $('#showCompanyMobile').text(data.company_mobile);
                        $('#showCompanyAddress').text(data.company_address);
                        $('#showCompanyState').text(data.state);
                        $('#showCompanyGST').text(data.gst_no);
                        $('#gstNo').val(data.gst_no);

                        $('#companyDetailsShow').show();
                        $('#SelectCompany').hide();
                        calculateTotals();
                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    alert('Something went wrong.');
                }
            });
        } else {
            $('#companyDetailsShow').hide();
            $('#SelectCompany').show();
        }
    });

    // Initial calculation
    updateSrNo();
    calculateRow($('#invoice-items .item-row:first'));
    calculateTotals();
});
    
</script>
 
<script>
$(document).ready(function() {
   $('#companySelect').on('change', function () {
        let companyId = $(this).val();
        if (companyId != 0) {
            $.ajax({
                url: "{{ url('get-company') }}/" + companyId,
                type: 'GET',
                success: function (response) {
                    if (response.status) {
                        let data = response.data;

                        $('#companyName').val(data.company_name);
                        $('#companyEmail').val(data.company_email);
                        $('#mob').val(data.company_mobile);
                        $('#companyAddress').val(data.company_address);
                        $('#state').val(data.state);
                        $('#gstNo').val(data.gst_no);
                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    alert('Something went wrong.');
                }
            });
        } 
    });
    $('#update-item').on('click', function() {
        let rowCount = $('#invoice-items tr').length + 1;

            let newRow = `
            <tr class="item-row">
                <td>${rowCount}</td>
                <input type="hidden" name="item_id[]" value="">
                <td><textarea class="form-control descp" name="descp[]" required></textarea></td>
                <td><input type="text" class="form-control hsnCode" name="hsnCode[]" required></td>
                <td><input type="number" class="form-control quant" name="quant[]" required></td>
                <td><input type="number" step="0.01" class="form-control unitRate" name="unitRate[]" required></td>
                <td><input type="number" step="0.01" class="form-control totalTax" name="totalTax[]" required></td>
                <td><input type="number" step="0.01" class="form-control gst_18" name="gst_18[]" required></td>
                <td><input type="number" step="0.01" class="form-control totalAmount" name="totalAmount[]" required></td>
                <td><button type="button" class="btn btn-danger remove-item">Remove</button></td>
            </tr>`;
            $('#invoice-items').append(newRow);
        
        });
});
</script>



<script>
$(document).ready(function() {
    const sellerGST = '27'; // Seller's state code (e.g., Maharashtra)

    function calculateTax() {
        let totalTaxable = parseFloat($('#totalTaxable').val()) || 0;
        let buyerGST = $('#gstNo').val() || '';
        let buyerState = buyerGST.substring(0, 2);

        let cgst = 0, sgst = 0, igst = 0;

        if (buyerState && buyerState === sellerGST) {
            cgst = totalTaxable * 0.09;  // 9%
            sgst = totalTaxable * 0.09;  // 9%
            igst = 0;
        } else {
            igst = totalTaxable * 0.18;  // 18%
        }

        // Update fields using ID
        $('#cgst').val(cgst.toFixed(2));
        $('#sgst').val(sgst.toFixed(2));
        $('#igst').val(igst.toFixed(2));

        // Total Amount
        let totalAmt = totalTaxable + cgst + sgst + igst;
        $('#totalAmt').val(totalAmt.toFixed(2));
    }

    // Trigger calculation when totalTaxable or gstNo changes
    $(document).on('input', '#totalTaxable, #gstNo', calculateTax);

    

    // Initial calculation on page load (if default values exist)
    calculateTax();
    
});
</script>


</body>
</html>