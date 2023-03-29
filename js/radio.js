	function updateShowInfo() {
		jQuery.getJSON('./radio-data')
			.done(function(data) {
				if (data.success && !data.results) {
					//console.log(data);
					jQuery('.player .show-name').text('Rotation');
					jQuery('.player .show-djs').text('rotation');
					jQuery('.player .show-name')
						.parent().css('pointer-events', 'none')
				} else {
					jQuery('.player .show-name').text(data.results[0].ShowName);
					var djs =
							data
								.results[0]
								.ShowUsers
								.map(function(x) { return x['DJName']; })
								.join(' & ');
					jQuery('.player .show-djs').text(djs);
					jQuery('.player .show-name')
						.parent().css('pointer-events', 'all')
					jQuery('.player .show-name')
						.parent()
						.attr('href', '/show/' + jQuery('.player .show-name').text())
				}

			})
	} updateShowInfo();

    jQuery('header.site-header').on('click', '.player i.fa-play', function(e) {
        AudioHandler.play();
    });

    jQuery('header.site-header').on('click', '.player i.fa-pause', function(e) {
        AudioHandler.pause();
    });




    var AudioHandler = {
        _isPlaying: false,
        _audioSource: 'https://ksdt.ucsd.edu/stream.mp3',
        _audio: null,
        _draw: null,
        _elem: jQuery('div.player'),
        pause: function() {
            this._analyser.audio.pause();
            this._elem
                    .find('i')
                    .removeClass('fa-pause')
                    .addClass('fa-play');
        },
        play: function() {
            try {
                if (this._analyser && this._analyser.audio) {
                    var _this = this;
                    var latestBufPoint = this._analyser.audio.buffered.length;
                    latestBufPoint = this._analyser.audio.buffered.end(latestBufPoint - 1);
                    this._analyser.audio.currentTime = latestBufPoint;
                    this._analyser.audio.play();
                    this._elem.find('i').removeClass('fa-play');
                    this._elem.find('i').addClass('fa-spinner fa-spin');
                    jQuery(this._audio).one('playing', function(e) {
                        _this._elem.find('i')
                        .removeClass('fa-spinner fa-spin')
                        .addClass('fa-pause');
                    });
                } else {
                    this._audio = new Audio(this._audioSource);
					this._audio.crossOrigin = "anonymous";
 
                    this._elem.find('i').removeClass('fa-play');
                    this._elem.find('i').addClass('fa-spinner fa-spin');
                    jQuery(this._audio).one('playing', function(e) {
                        _this._elem.find('i')
                        .removeClass('fa-spinner fa-spin')
                        .addClass('fa-pause');
                    });
                }
            } catch (e) {
                console.log(e);
            }
        },
    };