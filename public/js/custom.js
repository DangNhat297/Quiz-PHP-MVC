// function get param
function getParam(key) {
	var paramString = window.location.search
	let queryString = new URLSearchParams(paramString)
	return queryString.get(key)
}

// function get last param
function lastParam() {
	return window.location.pathname.split("/").pop()
}

// function time 
function formatDate(str, format) {
	return moment(str, 'YYYY-MM-DD HH:mm:ss').format(format)
}

$(document).on('change', '.file-attach', function (event) {
	$this = $(this)
	$this.next('.value_base64').val('')
	$(this).prev('span').remove()
	let filename = $(this).val().split('\\').pop()
	if (filename != '') {
		$(this).before(`<span class="text-info filename">${filename}</span>`)
		// let reader = new FileReader()
		// reader.onload = function () {
			// $output = $this.next('.value_base64')
			// $output.val(this.result)
		// }
		// reader.readAsDataURL(event.target.files[0])
		var formData = new FormData()
		formData.append("image", event.target.files[0])

		$.ajax({
			url: "https://api.imgur.com/3/image",
			type: "POST",
			datatype: "json",
			async: false,
			headers: {
				"Authorization": "Client-ID aca6d2502f5bfd8"
			},
			data: formData,
			success: function (response) {
				console.log(response);
				var photo = response.data.link;
				var photo_hash = response.data.deletehash;
				$output = $this.next('.value_base64')
				$output.val(response.data.link)
			},
			cache: false,
			contentType: false,
			processData: false
		})
	}
})

function countDown(element, minutes) {
	var timer2 = minutes + ':00'
	var interval = setInterval(function () {
		var timer = timer2.split(':');
		//by parsing integer, I avoid all extra string processing
		var minutes = parseInt(timer[0], 10);
		var seconds = parseInt(timer[1], 10);
		--seconds;
		minutes = (seconds < 0) ? --minutes : minutes;
		if (minutes < 0) {
			clearInterval(interval)
			element.addClass('text-danger')
			return
		};
		seconds = (seconds < 0) ? 59 : seconds;
		seconds = (seconds < 10) ? '0' + seconds : seconds;
		//minutes = (minutes < 10) ?  minutes : minutes;
		element.html(minutes + ':' + seconds);
		timer2 = minutes + ':' + seconds;
	}, 1000);
}

function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };