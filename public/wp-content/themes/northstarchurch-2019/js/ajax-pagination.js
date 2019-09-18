//hover over images
alert('Script is enqueued');

  function hover(element,a) {
  	switch (a) {
  		case 1:
        thisImage = '/images/facebook-logo-orange.png';
  			element.setAttribute('src', thisImage);
  			break;
  		case 2:
        thisImage = '/images/instagram-logo-orange.png';
  			element.setAttribute('src', thisImage);
  			break;
  		case 3:
        thisImage = '/images/twitter-logo-orange.png';
  			element.setAttribute('src', thisImage);
  			break;
  		case 4:
        thisImage = '/images/up-arrow-orange.png';
  			element.setAttribute('src', thisImage);
        break;
      case 5:
        thisImage = '/images/play-blue.png';
        element.setAttribute('src', thisImage);
  		default:
  			break;
  	}
	}

  function unhover(element,a) {
	switch (a) {
  		case 1:
        thisImage = '/images/facebook-logo.png';
  			element.setAttribute('src', thisImage);
  			break;
  		case 2:
        thisImage = '/images/instagram-logo.png';
  			element.setAttribute('src', thisImage);
  			break;
  		case 3:
        thisImage = '/images/twitter-logo.png';
  			element.setAttribute('src', thisImage);
  			break;
  		case 4:
        thisImage = '/images/up-arrow.png';
  			element.setAttribute('src', thisImage);
      case 5:
        thisImage = '/images/play-orange.png';
        element.setAttribute('src', thisImage);
  		default:
  			break;
  	}
  	}