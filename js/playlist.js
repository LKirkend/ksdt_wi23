function getPlaylist() {
  jQuery(document).ready(function(){
    jQuery(".old_playlist").click(function() {
      jQuery.ajax({
        url: 'fda',
        data: {
          'action': 'get_playlist',
          'playlist_id': this.id
        },
        success: function(playlist) {
          if(jQuery('.autoplay2').hasClass('slick-initialized')) {
            jQuery('.autoplay2').slick('unslick');
            jQuery('.autoplay2').empty();
          }
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
          playlist = (JSON.parse(playlist));
          for(var i = 0; i < playlist.length; i++) {
            jQuery('.autoplay2').slick('slickAdd','<div class="card"><div class="card-block"><h4 class="card-title-am"><span class="time-header"style="font-style: italic; "></span>' + playlist[i].SongName + ' | ' + playlist[i].Timestamp + '</h4><div class="cardContent inline"><h6 class="card-subtitle mb-2 text-muteds">by ' + playlist[i].ArtistName + '</h6></div></div></div>');
          }                  
        },
        error: function(err) {
          console.log(err);
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
}
getPlaylist();