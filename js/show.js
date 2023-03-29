jQuery(document).ready(function(){

      jQuery(document).ajaxStart(function () {
        jQuery("#loading").css('display','block');
      }).ajaxStop(function () {
        jQuery("#loading").css('display','none');
    });


    jQuery(".old_playlist").click(function() {
      const playlistDate = jQuery(this).text();
      const id = this.id;
      //Clean up previous playlist
                jQuery('#playlistDate').text('');

          jQuery('#playlistPlayer').empty();
          jQuery('#playlistHeading').css('padding-bottom','0px');

          if(jQuery('.autoplay2').hasClass('slick-initialized')) {
              jQuery('.autoplay2').slick('unslick');
              jQuery('.autoplay2').empty();
          }
      jQuery.ajax({
        //TODO: get the admin ajax url properly
        url: 'https://ksdt.ucsd.edu/wp-admin/admin-ajax.php',
        data: {
          'action': 'get_playlist',
          'playlist_id': id
        },
        success: function(playlist) {
          //Clean up previous playlist
          jQuery('#playlistPlayer').empty();
          jQuery('#playlistHeading').css('padding-bottom','0px');

          if(jQuery('.autoplay2').hasClass('slick-initialized')) {
              jQuery('.autoplay2').slick('unslick');
              jQuery('.autoplay2').empty();
          }
          //Error function when spinitron returns a failure
          if(playlist == 'failurenull') {
            //console.log('could not get spinitron data');
            jQuery('#playlistDate').text('Could not get playlist :(');
            jQuery('#playlistHeading').css('padding-bottom','20px');
            return;
          }

          jQuery('#playlistDate').text(playlistDate);
          var audioTag = '<audio controls style="width:50%;"src="https://ksdt.ucsd.edu/playlists/' + id + '.mp3">Your browser does not support the <code>audio</code> element.</audio>';

          jQuery('#playlistPlayer').append(audioTag);

          jQuery('.autoplay2').slick({
            initialSlide:  0,
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: false,
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            dots: false,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                }
              },
              {
                breakpoint: 800,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]
          });
          //console.log(playlist);
          playlist = (JSON.parse(playlist));
          //console.log(playlist);


          for(var i = 0; i < playlist.length; i++) {
            jQuery('.autoplay2').slick('slickAdd','<div class="card"><div class="card-block"><h4 class="card-title-am"><span class="time-header"style="font-style: italic; "></span>' + playlist[i].SongName + ' | ' + playlist[i].Timestamp + '</h4><div class="cardContent inline"><h6 class="card-subtitle mb-2 text-muteds">by ' + playlist[i].ArtistName + '</h6></div></div></div>');
          }                  
        }
      });
    });           
  
    jQuery('.autoplay').slick({
      initialSlide:  0,
      slidesToShow: 3,
      slidesToScroll: 1,
      centerMode: false,
      autoplay: false,
      autoplaySpeed: 2000,
      arrows: true,
      dots: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
     ]
    });
    jQuery('.autoplay1').slick({
      initialSlide:  0,
      slidesToShow: 3,
      slidesToScroll: 1,
      centerMode: true,
      autoplay: false,
      autoplaySpeed: 2000,
      arrows: true,
      dots: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
     ]
    });
  
 });