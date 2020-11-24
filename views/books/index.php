	<? include_once('./views/templates/header.php'); ?>
	<table border="1"> 
		<thead> 
			<tr> 
			</tr>
		</thead> 
		<tbody>
			<? foreach ($books as $book): ?>
				<tr> 
					<td> <?= $book['book_id']; ?></td>
					<td> <?= $book['book_name']; ?> </td>
					<td> <button onclick="addToCart(<?= $book['book_id']; ?>)"> Купить </button> </td>
				</tr>
			<? endforeach; ?>
		</tbody>
	</table>
	
	<!-- TODO: make a separate file for script -->
	<script> 
		function getCookie(name) {
			var matches = document.cookie.match(new RegExp(
				"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
			));
			return matches ? decodeURIComponent(matches[1]) : '';
		}

		function deleteCookie(name, path) {
			if (path == undefined) {
				path = '/';
			}

			setCookie(name, "", {
				expires: -1,
				path: path,
			});
		}

		function setCookie(name, value, options) {
			options = options || {};

			var expires = options.expires;

			if (typeof expires == "number" && expires) {
				var d = new Date();
				d.setTime(d.getTime() + expires * 1000);
				expires = options.expires = d;
			}
			if (expires && expires.toUTCString) {
				options.expires = expires.toUTCString();
			}

			value = encodeURIComponent(value);

			var updatedCookie = name + "=" + value;

			for (var propName in options) {
				updatedCookie += "; " + propName;
				var propValue = options[propName];
				if (propValue !== true) {
					updatedCookie += "=" + propValue;
				}
			}

			document.cookie = updatedCookie;
		}

		function addToCart(id) {

			var currentCart = getCookie('cart');
			// TODO: add also to localstorage; 
			if (!currentCart) {
				var currentBook = {};
				currentBook[id] = 1;
				var currentBookStringify = JSON.stringify(currentBook);
				setCookie('cart', currentBookStringify, {'path': '/'});
				//console.log(currentBookStringify);
			} else {
				var currentItems = JSON.parse(currentCart);
				console.log(currentItems);
				if (currentItems.hasOwnProperty(id)) {
					currentItems[id]++;
				} else {
					currentItems[id] = 1;
				}
				var currentItemsStringify = JSON.stringify(currentItems);
				setCookie('cart', currentItemsStringify, {'path': '/'});
			}
		}
		
	</script>
	
	<? include_once('./views/templates/footer.php'); ?>