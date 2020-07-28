<script src="{{ url('adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<<<<<<< HEAD
<script src="{{ url('adminlte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/JQueryCookie/jquery.cookie.js') }}"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('adminlte/js') }}/vue.js"></script>
<script src="{{ url('adminlte/plugins/select2/select2/dist/js') }}/select2.js"></script>
<script src="{{ url('adminlte/js') }}/main.js"></script>
<script src="{{ url('adminlte/plugins/JQueryPrint/') }}/jquery.print-preview.js"></script>
<script src="{{ url('adminlte/morris') }}/morris.min.js"></script>
<script src="{{ url('adminlte/morris') }}/raphael.min.js"></script>
=======
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="{{ url('adminlte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/JQueryCookie/jquery.cookie.js') }}"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script src="{{ url('adminlte/js') }}/main.js"></script>
<script src="{{ url('adminlte/plugins/JQueryPrint/') }}/jquery.print-preview.js"></script>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('adminlte/js/app.min.js') }}"></script>
<<<<<<< HEAD
<script src="{{ url('js/printThis.js') }}"></script>



=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
<script>
    window._token = '{{ csrf_token() }}';
</script>
<script>
$(document).ready(function(){

	
	// message modal
	$('.message').bind('click', function(e) {
            e.preventDefault();
            $('.modal-body').empty();
            var data= $(this).attr('data-id');
            
            $('.modal-body').append('<p>' + data + '</p>' );
   	 });
    
    // for tabs
      $('ul.nav-tabs li').click(function() {
            $('ul.nav-tabs li.active').removeClass('active');
            $(this).addClass('active');
            $('.tab-pane').hide();
            var activeTab = $(this).find('a').attr('href');
            //console.log(activeTab);
            $(activeTab).show();
            $.cookie('selectedTab', activeTab, {expires: 7}); // Save active tab in cookie
            return false;
      });
      var activeTab = $.cookie('selectedTab'); // Retrieve active tab
      if (activeTab) {
            $('ul.nav-tabs li:has(a[href="' + activeTab + '"])').click(); // And simulate clicking it
      }
});
<<<<<<< HEAD

// Javascript Notification 

// start Browserr Fuction 
document.addEventListener('DOMContentLoaded', function () 
{

    if (Notification.permission !== "granted")
    {
      Notification.requestPermission();
    }

});
var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }   
// Push N0otification 
function notifyBrowser(title,desc, id) 
{

      if (Notification.permission !== "granted")
      {
            Notification.requestPermission();
      }
      else
      {
            var notification = new Notification(title, {
            icon:"{{ url('adminlte/img/logo.jpg') }}",
            body: desc,
          });

        /* Callback function when the notification is closed. */
            notification.onclose = function () {
                  $.ajax({
                         data: {  
                               roleId: id,                      
                              _token: '{!! csrf_token() !!}'
                    
                        },
                        method: 'PUT',
                        dataType: 'json',
                        url : baseurl + "/admin/markAsRead",
                        success : function(data){           
                              console.log(data.msg);
                        }
                  });
            };

      }
}

//trigger event to get notification
  
var old_count = 0;

setInterval(function(){    
    $.ajax({
         method: 'GET',
         dataType: 'json',
         url : baseurl + "/admin/unreadnotifications",
        success : function(data){ 
              console.log(data); 
            if (data.length > old_count) {             
                  if(data[0].length == 0) { 
                        console.log('zero');                                      
                        
                  } else {
                                          
                  $.each(data, function (i, d){                              
                        var title = "Attention!!!";
                        var desc = d.message;
                        var id = d.roleId;
                        notifyBrowser(title,desc, id);                  
                  });                       
                  } 
            old_count = data.lenght;
            }        
        }
    });
},10000); 

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
</script>


@yield('javascript')