<?php
/* Copyright 2008-2016  Kyle Baker  (email: kyleabaker@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Security measure
defined( 'ABSPATH' ) or die( 'Cannot access pages directly.' );

// Detect Web Browsers
function wpua_detect_webbrowser()
{
	global $useragent, $wpua_show_version;

	$version = null;

	if (preg_match('/360se/i', $useragent))
	{
		$link = 'http://se.360.cn/';
		$title = '360Safe Explorer';
		$version = '';
		$code = '360se';
	}
	elseif (preg_match('/Abolimba/i', $useragent))
	{
		$link = 'http://www.aborange.de/products/freeware/abolimba-multibrowser.php';
		$title = 'Abolimba';
		$version = '';
		$code = 'abolimba';
	}
	elseif (preg_match('/Acoo\ Browser/i', $useragent))
	{
		$link = 'http://www.acoobrowser.com/';
		$title = 'Acoo Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'acoobrowser';
	}
	elseif (preg_match('/Alienforce/i', $useragent))
	{
		$link = 'http://sourceforge.net/projects/alienforce/';
		$title = 'Alienforce';
		$code = 'alienforce';
	}
	elseif (preg_match('/Amaya/i', $useragent))
	{
		$link = 'http://www.w3.org/Amaya/';
		$title = 'Amaya';
		$code = 'amaya';
	}
	elseif (preg_match('/Amiga-AWeb/i', $useragent))
	{
		$link = 'http://aweb.sunsite.dk/';
		$title = 'Amiga AWeb';
		$version = wpua_detect_browser_version('AWeb');
		$code = 'amiga-aweb';
	}
	elseif (preg_match('/MRCHROME/i', $useragent))
	{
		$link = 'http://amigo.mail.ru/';
		$title = 'Amigo';
		$version = '';
		$code = 'amigo';
	}
	elseif (preg_match('/America\ Online\ Browser/i', $useragent))
	{
		$link = 'http://downloads.channel.aol.com/browser';
		$title = 'America Online Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'aol';
	}
	elseif (preg_match('/AmigaVoyager/i', $useragent))
	{
		$link = 'http://v3.vapor.com/voyager/';
		$title = 'Amiga Voyager';
		$version = wpua_detect_browser_version('Voyager');
		$code = 'amigavoyager';
	}
	elseif (preg_match('/ANTFresco/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Fresco_(web_browser)';
		$title = 'ANT Fresco';
		$version = wpua_detect_browser_version('Fresco');
		$code = 'antfresco';
	}
	elseif (preg_match('/AOL/i', $useragent))
	{
		$link = 'http://downloads.channel.aol.com/browser';
		$title = 'AOL';
		$code = 'aol';
	}
	elseif (preg_match('/Arora/i', $useragent))
	{
		$link = 'http://code.google.com/p/arora/';
		$title = 'Arora';
		$code = 'arora';
	}
	elseif (preg_match('/AtomicBrowser/i', $useragent))
	{
		$link = 'http://www.atomicwebbrowser.com/';
		$title = 'Atomic Web Browser';
		$version = wpua_detect_browser_version('AtomicBrowser');
		$code = 'atomicwebbrowser';
	}
	elseif (preg_match('/Avant\ Browser/i', $useragent))
	{
		$link = 'http://www.avantbrowser.com/';
		$title = 'Avant Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'avantbrowser';
	}
	elseif (preg_match('/WhiteHat\ Aviator/i', $useragent))
	{
		$link = 'http://www.whitehatsec.com/aviator/';
		$title = 'Aviator';
		$code = 'aviator';
	}
	elseif (preg_match('/baidubrowser/i', $useragent))
	{
		$link = 'http://liulanqi.baidu.com/';
		$title = 'Baidu Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'baidubrowser';
	}
	elseif (preg_match('/\ Spark/i', $useragent))
	{
		$link = 'http://en.browser.baidu.com/';
		$title = 'Baidu Spark';
		$version = wpua_detect_browser_version('Spark');
		$code = 'baiduspark';
	}
	elseif (preg_match('/BarcaPro/i', $useragent))
	{
		$link = 'http://www.pocosystems.com/home/index.php?option=content&task=category&sectionid=2&id=9&Itemid=27';
		$title = 'Barca Pro';
		$version = wpua_detect_browser_version('BarcaPro');
		$code = 'barca';
	}
	elseif (preg_match('/Barca/i', $useragent))
	{
		$link = 'http://www.pocosystems.com/home/index.php?option=content&task=category&sectionid=2&id=9&Itemid=27';
		$title = 'Barca';
		$code = 'barca';
	}
	elseif (preg_match('/Beamrise/i', $useragent))
	{
		$link = 'http://www.beamrise.com/';
		$title = 'Beamrise';
		$code = 'beamrise';
	}
	elseif (preg_match('/Beonex/i', $useragent))
	{
		$link = 'http://www.beonex.com/';
		$title = 'Beonex';
		$code = 'beonex';
	}
	elseif (preg_match('/BlackBerry/i', $useragent))
	{
		$link = 'http://www.blackberry.com/';
		$title = 'BlackBerry';
		$code = 'blackberry';
	}
	elseif (preg_match('/Blackbird/i', $useragent))
	{
		$link = 'http://www.blackbirdbrowser.com/';
		$title = 'Blackbird';
		$code = 'blackbird';
	}
	elseif (preg_match('/BlackHawk/i', $useragent))
	{
		$link = 'http://www.netgate.sk/blackhawk/help/welcome-to-blackhawk-web-browser.html';
		$title = 'BlackHawk';
		$code = 'blackhawk';
	}
	elseif (preg_match('/Blazer/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Blazer_(web_browser)';
		$title = 'Blazer';
		$code = 'blazer';
	}
	elseif (preg_match('/Bolt/i', $useragent))
	{
		$link = 'http://www.boltbrowser.com/';
		$title = 'Bolt';
		$code = 'bolt';
	}
	elseif (preg_match('/BonEcho/i', $useragent))
	{
		$link = 'http://www.mozilla.org/projects/minefield/';
		$title = 'BonEcho';
		$code = 'firefoxdevpre';
	}
	elseif (preg_match('/BrowseX/i', $useragent))
	{
		$link = 'http://pdqi.com/browsex/';
		$title = 'BrowseX';
		$version = '';
		$code = 'browsex';
	}
	elseif (preg_match('/Browzar/i', $useragent))
	{
		$link = 'http://www.browzar.com/';
		$title = 'Browzar';
		$code = 'browzar';
	}
	elseif (preg_match('/Bunjalloo/i', $useragent))
	{
		$link = 'http://code.google.com/p/quirkysoft/';
		$title = 'Bunjalloo';
		$code = 'bunjalloo';
	}
	elseif (preg_match('/Camino/i', $useragent))
	{
		$link = 'http://www.caminobrowser.org/';
		$title = 'Camino';
		$code = 'camino';
	}
	elseif (preg_match('/Cayman\ Browser/i', $useragent))
	{
		$link = 'http://www.caymanbrowser.com/';
		$title = 'Cayman Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'caymanbrowser';
	}
	elseif (preg_match('/Charon/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Charon_(web_browser)';
		$title = 'Charon';
		$code = 'null';
	}
	elseif (preg_match('/Cheshire/i', $useragent))
	{
		$link = 'http://downloads.channel.aol.com/browser';
		$title = 'Cheshire';
		$code = 'aol';
	}
	elseif (preg_match('/Chimera/i', $useragent))
	{
		$link = 'http://www.chimera.org/';
		$title = 'Chimera';
		$code = 'null';
	}
	elseif (preg_match('/chromeframe/i', $useragent))
	{
		$link = 'http://code.google.com/chrome/chromeframe/';
		$title = 'Google Chrome Frame';
		$version = wpua_detect_browser_version('chromeframe');
		$code = 'google';
	}
	elseif (preg_match('/ChromePlus/i', $useragent))
	{
		$link = 'http://www.chromeplus.org/';
		$title = 'ChromePlus';
		$code = 'chromeplus';
	}
	elseif (preg_match('/Iron/i', $useragent))
	{
		$link = 'http://www.srware.net/';
		$title = 'SRWare Iron';
		$version = wpua_detect_browser_version('Iron');
		$code = 'srwareiron';
	}
	elseif (preg_match('/Chromium/i', $useragent))
	{
		$link = 'http://www.chromium.org/';
		$title = 'Chromium';
		$code = 'chromium';
	}
	elseif (preg_match('/Classilla/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Classilla';
		$title = 'Classilla';
		$version = wpua_detect_browser_version(' rv');
		$code = 'classilla';
	}
	elseif (preg_match('/Coast/i', $useragent))
	{
		$link = 'http://coastbyopera.com/';
		$title = 'Coast';
		$code = 'coast';
	}
	elseif (preg_match('/coc_coc_browser/i', $useragent))
	{
		$link = 'http://coccoc.vn/';
		$title = 'Coc Coc';
		$version = wpua_detect_browser_version('coc_coc_browser');
		$code = 'coccoc';
	}
	elseif (preg_match('/Columbus/i', $useragent))
	{
		$link = 'http://www.columbus-browser.com/';
		$title = 'Columbus';
		$code = 'columbus';
	}
	elseif (preg_match('/CometBird/i', $useragent))
	{
		$link = 'http://www.cometbird.com/';
		$title = 'CometBird';
		$code = 'cometbird';
	}
	elseif (preg_match('/Comodo_Dragon/i', $useragent))
	{
		$link = 'http://www.comodo.com/home/internet-security/browser.php';
		$title = 'Comodo Dragon';
		$version = wpua_detect_browser_version('Dragon');
		$code = 'comodo-dragon';
	}
	elseif (preg_match('/Conkeror/i', $useragent))
	{
		$link = 'http://www.conkeror.org/';
		$title = 'Conkeror';
		$code = 'conkeror';
	}
	elseif (preg_match('/CoolNovo/i', $useragent))
	{
		$link = 'http://www.coolnovo.com/';
		$title = 'CoolNovo';
		$code = 'coolnovo';
	}
	elseif (preg_match('/CoRom/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/C%E1%BB%9D_R%C3%B4m%2B_(browser)';
		$title = 'CoRom';
		$code = 'corom';
	}
	elseif (preg_match('/Crazy\ Browser/i', $useragent))
	{
		$link = 'http://www.crazybrowser.com/';
		$title = 'Crazy Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'crazybrowser';
	}
	elseif (preg_match('/CrMo/i', $useragent))
	{
		$link = 'http://www.google.com/chrome';
		$title = 'Chrome Mobile';
		$version = wpua_detect_browser_version('CrMo');
		$code = 'chrome';
	}
	elseif (preg_match('/CriOS/i', $useragent))
	{
		$link = 'http://www.google.com/chrome';
		$title = 'Chrome';
		$version = wpua_detect_browser_version('CriOS');
		$code = 'chrome';
	}
	elseif (preg_match('/Cruz/i', $useragent))
	{
		$link = 'http://www.cruzapp.com/';
		$title = 'Cruz';
		$code = 'cruz';
	}
	elseif (preg_match('/Cyberdog/i', $useragent))
	{
		$link = 'http://www.cyberdog.org/about/cyberdog/cyberbrowse.html';
		$title = 'Cyberdog';
		$code = 'cyberdog';
	}
	elseif (preg_match('/Deepnet\ Explorer/i', $useragent))
	{
		$link = 'http://www.deepnetexplorer.com/';
		$title = 'Deepnet Explorer';
		$code = 'deepnetexplorer';
	}
	elseif (preg_match('/Demeter/i', $useragent))
	{
		$link = 'http://www.hurrikenux.com/Demeter/';
		$title = 'Demeter';
		$code = 'demeter';
	}
	elseif (preg_match('/DeskBrowse/i', $useragent))
	{
		$link = 'http://www.deskbrowse.org/';
		$title = 'DeskBrowse';
		$code = 'deskbrowse';
	}
	elseif (preg_match('/Dillo/i', $useragent))
	{
		$link = 'http://www.dillo.org/';
		$title = 'Dillo';
		$code = 'dillo';
	}
	elseif (preg_match('/DoCoMo/i', $useragent))
	{
		$link = 'http://www.nttdocomo.com/';
		$title = 'DoCoMo';
		$code = 'null';
	}
	elseif (preg_match('/DocZilla/i', $useragent))
	{
		$link = 'http://www.doczilla.com/';
		$title = 'DocZilla';
		$code = 'doczilla';
	}
	elseif (preg_match('/Dolfin/i', $useragent))
	{
		$link = 'http://www.samsungmobile.com/';
		$title = 'Dolfin';
		$code = 'samsung';
	}
	elseif (preg_match('/Dooble/i', $useragent))
	{
		$link = 'http://dooble.sourceforge.net/';
		$title = 'Dooble';
		$code = 'dooble';
	}
	elseif (preg_match('/Doris/i', $useragent))
	{
		$link = 'http://www.anygraaf.fi/browser/indexe.htm';
		$title = 'Doris';
		$code = 'doris';
	}
	elseif (preg_match('/Dorothy/i', $useragent))
	{
		$link = 'http://www.dorothybrowser.com/';
		$title = 'Dorothy';
		$code = 'dorothybrowser';
	}
	elseif (preg_match('/DPlus/i', $useragent))
	{
		$link = 'http://dplus-browser.sourceforge.net/';
		$version = wpua_detect_browser_version('DPlus');
		$title = 'D+';
		$code = 'dillo';
	}
	elseif (preg_match('/Edbrowse/i', $useragent))
	{
		$link = 'http://edbrowse.sourceforge.net/';
		$title = 'Edbrowse';
		$code = 'edbrowse';
	}
	elseif (preg_match('/Element\ Browser/i', $useragent))
	{
		$link = 'http://www.elementsoftware.co.uk/software/elementbrowser/';
		$title = 'Element Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'elementbrowser';
	}
	elseif (preg_match('/Elinks/i', $useragent))
	{
		$link = 'http://elinks.or.cz/';
		$title = 'Elinks';
		$code = 'elinks';
	}
	elseif (preg_match('/Enigma\ Browser/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Enigma_Browser';
		$title = 'Enigma Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'enigmabrowser';
	}
	elseif (preg_match('/EnigmaFox/i', $useragent))
	{
		$link = '#';
		$title = 'EnigmaFox';
		$code = 'null';
	}
	elseif (preg_match('/Epic/i', $useragent))
	{
		$link = 'http://www.epicbrowser.com/';
		$title = 'Epic';
		$code = 'epicbrowser';
	}
	elseif (preg_match('/Epiphany/i', $useragent))
	{
		$link = 'http://gnome.org/projects/epiphany/';
		$title = 'Epiphany';
		$code = 'epiphany';
	}
	elseif (preg_match('/Escape/i', $useragent))
	{
		$link = 'http://www.espial.com/products/evo_browser/';
		$title = 'Espial TV Browser';
		$code = 'espialtvbrowser';
	}
	elseif (preg_match('/Espial/i', $useragent))
	{
		$link = 'http://www.espial.com/products/evo_browser/';
		$title = 'Espial TV Browser';
		$code = 'espialtvbrowser';
	}
	elseif (preg_match('/Fennec/i', $useragent))
	{
		$link = 'https://wiki.mozilla.org/Fennec';
		$title = 'Fennec';
		$code = 'fennec';
	}
	elseif (preg_match('/Firebird/i', $useragent))
	{
		$link = 'http://seb.mozdev.org/firebird/';
		$title = 'Firebird';
		$code = 'firebird';
	}
	elseif (preg_match('/Fireweb\ Navigator/i', $useragent))
	{
		$link = 'http://www.arsslensoft.tk/?q=node/7';
		$title = 'Fireweb Navigator';
		$code = 'firewebnavigator';
	}
	elseif (preg_match('/Flock/i', $useragent))
	{
		$link = 'http://www.flock.com/';
		$title = 'Flock';
		$code = 'flock';
	}
	elseif (preg_match('/Fluid/i', $useragent))
	{
		$link = 'http://www.fluidapp.com/';
		$title = 'Fluid';
		$code = 'fluid';
	}
	elseif (preg_match('/Galaxy/i', $useragent)
		&& !preg_match('/Chrome/i', $useragent))
	{
		$link = 'http://www.traos.org/';
		$title = 'Galaxy';
		$code = 'galaxy';
	}
	elseif (preg_match('/Galeon/i', $useragent))
	{
		$link = 'http://galeon.sourceforge.net/';
		$title = 'Galeon';
		$code = 'galeon';
	}
	elseif (preg_match('/GlobalMojo/i', $useragent))
	{
		$link = 'http://www.globalmojo.com/';
		$title = 'GlobalMojo';
		$code = 'globalmojo';
	}
	elseif (preg_match('/GoBrowser/i', $useragent))
	{
		$link = 'http://www.gobrowser.cn/';
		$title = 'GO Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'gobrowser';
	}
	elseif (preg_match('/Google\ Wireless\ Transcoder/i', $useragent))
	{
		$link = 'http://google.com/gwt/n';
		$title = 'Google Wireless Transcoder';
		$version = '';
		$code = 'google';
	}
	elseif (preg_match('/GoSurf/i', $useragent))
	{
		$link = 'http://gosurfbrowser.com/?ln=en';
		$title = 'GoSurf';
		$code = 'gosurf';
	}
	elseif (preg_match('/GranParadiso/i', $useragent))
	{
		$link = 'http://www.mozilla.org/';
		$title = 'GranParadiso';
		$code = 'firefoxdevpre';
	}
	elseif (preg_match('/GreenBrowser/i', $useragent))
	{
		$link = 'http://www.morequick.com/';
		$title = 'GreenBrowser';
		$code = 'greenbrowser';
	}
	elseif (preg_match('/GSA/i', $useragent)
		&& preg_match('/Mobile/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Google_Search#Mobile_app';
		$title = 'Google Search App';
		$version = wpua_detect_browser_version('GSA');
		$code = 'google';
	}
	elseif (preg_match('/Hana/i', $useragent))
	{
		$link = 'http://www.alloutsoftware.com/';
		$title = 'Hana';
		$code = 'hana';
	}
	elseif (preg_match('/HotJava/i', $useragent))
	{
		$link = 'http://java.sun.com/products/archive/hotjava/';
		$title = 'HotJava';
		$code = 'hotjava';
	}
	elseif (preg_match('/Hv3/i', $useragent))
	{
		$link = 'http://tkhtml.tcl.tk/hv3.html';
		$title = 'Hv3';
		$code = 'hv3';
	}
	elseif (preg_match('/Hydra\ Browser/i', $useragent))
	{
		$link = 'http://www.hydrabrowser.com/';
		$title = 'Hydra Browser';
		$version = '';
		$code = 'hydrabrowser';
	}
	elseif (preg_match('/Iris/i', $useragent))
	{
		$link = 'http://www.torchmobile.com/';
		$title = 'Iris';
		$code = 'iris';
	}
	elseif (preg_match('/IBM\ WebExplorer/i', $useragent))
	{
		$link = 'http://www.networking.ibm.com/WebExplorer/';
		$title = 'IBM WebExplorer';
		$version = wpua_detect_browser_version('WebExplorer');
		$code = 'ibmwebexplorer';
	}
	elseif (preg_match('/IBrowse/i', $useragent)
		&& !preg_match('/MiuiBrowser/i', $useragent))
	{
		$link = 'http://www.ibrowse-dev.net/';
		$title = 'IBrowse';
		$code = 'ibrowse';
	}
	elseif (preg_match('/iCab/i', $useragent))
	{
		$link = 'http://www.icab.de/';
		$title = 'iCab';
		$code = 'icab';
	}
	elseif (preg_match('/Ice Browser/i', $useragent))
	{
		$link = 'http://www.icesoft.com/products/icebrowser.html';
		$title = 'Ice Browser';
		$code = 'icebrowser';
	}
	elseif (preg_match('/Iceape/i', $useragent))
	{
		$link = 'http://packages.debian.org/iceape';
		$title = 'Iceape';
		$code = 'iceape';
	}
	elseif (preg_match('/IceCat/i', $useragent))
	{
		$link = 'http://gnuzilla.gnu.org/';
		$title = 'GNU IceCat';
		$version = wpua_detect_browser_version('IceCat');
		$code = 'icecat';
	}
	elseif (preg_match('/IceDragon/i', $useragent))
	{
		$link = 'http://www.comodo.com/home/browsers-toolbars/icedragon-browser.php';
		$title = 'IceDragon';
		$code = 'icedragon';
	}
	elseif (preg_match('/IceWeasel/i', $useragent))
	{
		$link = 'http://www.geticeweasel.org/';
		$title = 'IceWeasel';
		$code = 'iceweasel';
	}
	elseif (preg_match('/IEMobile/i', $useragent))
	{
		$link = 'http://www.microsoft.com/windowsmobile/en-us/downloads/microsoft/internet-explorer-mobile.mspx';
		$title = 'IEMobile';
		$code = 'msie-mobile';
	}
	elseif (preg_match('/iNet\ Browser/i', $useragent))
	{
		$link = 'http://alexanderjbeston.wordpress.com/';
		$title = 'iNet Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'null';
	}
	elseif (preg_match('/iRider/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/IRider';
		$title = 'iRider';
		$code = 'irider';
	}
	elseif (preg_match('/Iron/i', $useragent))
	{
		$link = 'http://www.srware.net/en/software_srware_iron.php';
		$title = 'Iron';
		$code = 'iron';
	}
	elseif (preg_match('/InternetSurfboard/i', $useragent))
	{
		$link = 'http://inetsurfboard.sourceforge.net/';
		$title = 'InternetSurfboard';
		$code = 'internetsurfboard';
	}
	elseif (preg_match('/Jasmine/i', $useragent))
	{
		$link = 'http://www.samsungmobile.com/';
		$title = 'Jasmine';
		$code = 'samsung';
	}
	elseif (preg_match('/K-Meleon/i', $useragent))
	{
		$link = 'http://kmeleon.sourceforge.net/';
		$title = 'K-Meleon';
		$code = 'kmeleon';
	}
	elseif (preg_match('/K-Ninja/i', $useragent))
	{
		$link = 'http://k-ninja-samurai.en.softonic.com/';
		$title = 'K-Ninja';
		$code = 'kninja';
	}
	elseif (preg_match('/Kapiko/i', $useragent))
	{
		$link = 'http://ufoxlab.googlepages.com/cooperation';
		$title = 'Kapiko';
		$code = 'kapiko';
	}
	elseif (preg_match('/Kazehakase/i', $useragent))
	{
		$link = 'http://kazehakase.sourceforge.jp/';
		$title = 'Kazehakase';
		$code = 'kazehakase';
	}
	elseif (preg_match('/Kinza/i', $useragent))
	{
		$link = 'http://www.kinza.jp/';
		$title = 'Kinza';
		$code = 'kinza';
	}
	elseif (preg_match('/Strata/i', $useragent))
	{
		$link = 'http://www.kirix.com/';
		$title = 'Kirix Strata';
		$version = wpua_detect_browser_version('Strata');
		$code = 'kirix-strata';
	}
	elseif (preg_match('/KKman/i', $useragent))
	{
		$link = 'http://www.kkman.com.tw/';
		$title = 'KKman';
		$code = 'kkman';
	}
	elseif (preg_match('/KMail/i', $useragent))
	{
		$link = 'http://kontact.kde.org/kmail/';
		$title = 'KMail';
		$code = 'kmail';
	}
	elseif (preg_match('/KMLite/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/K-Meleon';
		$title = 'KMLite';
		$code = 'kmeleon';
	}
	elseif (preg_match('/Konqueror/i', $useragent))
	{
		$link = 'http://konqueror.kde.org/';
		$title = 'Konqueror';
		$code = 'konqueror';
	}
	elseif (preg_match('/Kylo/i', $useragent))
	{
		$link = 'http://kylo.tv/';
		$title = 'Kylo';
		$code = 'kylo';
	}
	elseif (preg_match('/LBrowser/i', $useragent))
	{
		$link = 'http://wiki.freespire.org/index.php/Web_Browser';
		$title = 'LBrowser';
		$code = 'lbrowser';
	}
	elseif (preg_match('/LG Browser/i', $useragent))
	{
		$link = 'http://developer.lgappstv.com/TV_HELP/index.jsp?topic=%2Flge.tvsdk.developing.book%2Fhtml%2FDeveloping+Web+App%2FDeveloping+Web+App%2FWeb+Engine.htm';
		$title = 'LG Web Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'lgbrowser';
	}
	elseif (preg_match('/LeechCraft/i', $useragent))
	{
		$link = 'http://leechcraft.org/';
		$title = 'LeechCraft';
		$version = '';
		$code = 'null';
	}
	elseif (preg_match('/Links/i', $useragent)
		&& !preg_match('/online\ link\ validator/i', $useragent))
	{
		$link = 'http://links.sourceforge.net/';
		$version = wpua_detect_browser_version('Links \\(');
		$title = 'Links';
		$code = 'links';
	}
	elseif (preg_match('/Lobo/i', $useragent))
	{
		$link = 'http://www.lobobrowser.org/';
		$title = 'Lobo';
		$code = 'lobo';
	}
	elseif (preg_match('/lolifox/i', $useragent))
	{
		$link = 'http://www.lolifox.com/';
		$title = 'lolifox';
		$code = 'lolifox';
	}
	elseif (preg_match('/Lorentz/i', $useragent))
	{
		$link = 'http://news.softpedia.com/news/Firefox-Codenamed-Lorentz-Drops-in-March-2010-130855.shtml';
		$title = 'Lorentz';
		$code = 'firefoxdevpre';
	}
	elseif (preg_match('/luakit/i', $useragent))
	{
		$link = 'http://luakit.org/';
		$title = 'luakit';
		$version = '';
		$code = 'luakit';
	}
	elseif (preg_match('/Lunascape/i', $useragent))
	{
		$link = 'http://www.lunascape.tv';
		$title = 'Lunascape';
		$code = 'lunascape';
	}
	elseif (preg_match('/Lynx/i', $useragent))
	{
		$link = 'http://lynx.browser.org/';
		$title = 'Lynx';
		$code = 'lynx';
	}
	elseif (preg_match('/Madfox/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Madfox';
		$title = 'Madfox';
		$code = 'madfox';
	}
	elseif (preg_match('/Maemo\ Browser/i', $useragent))
	{
		$link = 'http://maemo.nokia.com/features/maemo-browser/';
		$title = 'Maemo Browser';
		$code = 'maemo';
	}
	elseif (preg_match('/Maxthon/i', $useragent))
	{
		$link = 'http://www.maxthon.com/';
		$title = 'Maxthon';
		$code = 'maxthon';
	}
	elseif (preg_match('/\ MIB\//i', $useragent))
	{
		$link = 'http://www.motorola.com/content.jsp?globalObjectId=1827-4343';
		$title = 'MIB';
		$code = 'mib';
	}
	elseif (preg_match('/Tablet\ browser/i', $useragent))
	{
		$link = 'http://browser.garage.maemo.org/';
		$title = 'MicroB';
		$version = wpua_detect_browser_version('Tablet browser');
		$code = 'microb';
	}
	elseif (preg_match('/Midori/i', $useragent))
	{
		$link = 'http://www.twotoasts.de/index.php?/pages/midori_summary.html';
		$title = 'Midori';
		$code = 'midori';
	}
	elseif (preg_match('/ min\//i', $useragent))
	{
		$link = 'https://github.com/minbrowser/min';
		$title = 'Min Browser';
		$version = wpua_detect_browser_version('min');
		$code = 'min';
	}
	elseif (preg_match('/Minefield/i', $useragent))
	{
		$link = 'http://www.mozilla.org/projects/minefield/';
		$title = 'Minefield';
		$code = 'minefield';
	}
	elseif (preg_match('/MiniBrowser/i', $useragent))
	{
		$link = 'http://dmkho.tripod.com/';
		$title = 'MiniBrowser';
		$code = 'minibrowser';
	}
	elseif (preg_match('/Minimo/i', $useragent))
	{
		$link = 'http://www-archive.mozilla.org/projects/minimo/';
		$title = 'Minimo';
		$code = 'minimo';
	}
	elseif (preg_match('/MiuiBrowser/i', $useragent))
	{
		$link = 'https://en.wikipedia.org/wiki/MIUI';
		$title = 'MIUI Browser';
		$version = wpua_detect_browser_version('MiuiBrowser');
		$code = 'miuibrowser';
	}
	elseif (preg_match('/Mosaic/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Mosaic_(web_browser)';
		$title = 'Mosaic';
		$code = 'mosaic';
	}
	elseif (preg_match('/MozillaDeveloperPreview/i', $useragent))
	{
		$link = 'http://www.mozilla.org/projects/devpreview/releasenotes/';
		$title = 'Mozilla Developer Preview';
		$version = wpua_detect_browser_version('MozillaDeveloperPreview');
		$code = 'firefoxdevpre';
	}
	elseif (preg_match('/MQQBrowser/i', $useragent)
		|| preg_match('/QQBrowser/i', $useragent))
	{
		$link = 'http://browser.qq.com/';
		$title = 'QQbrowser';
		if (preg_match('/MQQBrowser/i', $useragent))
		{
			$version = '';
		}
		$code = 'qqbrowser';
	}
	elseif (preg_match('/Multi-Browser/i', $useragent))
	{
		$link = 'http://www.multibrowser.de/';
		$title = 'Multi-Browser XP';
		$version = wpua_detect_browser_version('Multi-Browser');
		$code = 'multi-browserxp';
	}
	elseif (preg_match('/MultiZilla/i', $useragent))
	{
		$link = 'http://multizilla.mozdev.org/';
		$title = 'MultiZilla';
		$code = 'mozilla';
	}
	elseif (preg_match('/MxNitro/i', $useragent))
	{
		$link = 'http://usa.maxthon.com/mxnitro/';
		$title = 'MxNitro';
		$code = 'mxnitro';
	}
	elseif (preg_match('/myibrow/i', $useragent)
		&& preg_match('/My\ Internet\ Browser/i', $useragent))
	{
		$link = 'http://myinternetbrowser.webove-stranky.org/';
		$title = 'myibrow';
		$code = 'my-internet-browser';
	}
	elseif (preg_match('/MyIE2/i', $useragent))
	{
		$link = 'http://www.myie2.com/';
		$title = 'MyIE2';
		$code = 'myie2';
	}
	elseif (preg_match('/Namoroka/i', $useragent))
	{
		$link = 'https://wiki.mozilla.org/Firefox/Namoroka';
		$title = 'Namoroka';
		$code = 'firefoxdevpre';
	}
	elseif (preg_match('/Navigator/i', $useragent))
	{
		$link = 'http://netscape.aol.com/';
		$title = 'Netscape Navigator';
		$version = wpua_detect_browser_version('Navigator');
		$code = 'netscape';
	}
	elseif (preg_match('/NetBox/i', $useragent))
	{
		$link = 'http://www.netgem.com/';
		$title = 'NetBox';
		$code = 'netbox';
	}
	elseif (preg_match('/NetCaptor/i', $useragent))
	{
		$link = 'http://www.netcaptor.com/';
		$title = 'NetCaptor';
		$code = 'netcaptor';
	}
	elseif (preg_match('/NetFrontLifeBrowser/i', $useragent))
	{
		$link = 'http://gl.access-company.com/files/legacy/products/nflife/app_browser2.html';
		$title = 'NetFront Life';
		$version = wpua_detect_browser_version('NetFrontLifeBrowser');
		$code = 'netfrontlife';
	}
	elseif (preg_match('/NetFront/i', $useragent))
	{
		$link = 'http://www.access-company.com/';
		$title = 'NetFront';
		$code = 'netfront';
	}
	elseif (preg_match('/NetNewsWire/i', $useragent))
	{
		$link = 'http://www.newsgator.com/individuals/netnewswire/';
		$title = 'NetNewsWire';
		$code = 'netnewswire';
	}
	elseif (preg_match('/NetPositive/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/NetPositive';
		$title = 'NetPositive';
		$code = 'netpositive';
	}
	elseif (preg_match('/Netscape/i', $useragent))
	{
		$link = 'http://netscape.aol.com/';
		$title = 'Netscape';
		$code = 'netscape';
	}
	elseif (preg_match('/NetSurf/i', $useragent))
	{
		$link = 'http://www.netsurf-browser.org/';
		$title = 'NetSurf';
		$code = 'netsurf';
	}
	elseif (preg_match('/NF-Browser/i', $useragent))
	{
		$link = 'http://www.access-company.com/';
		$title = 'NetFront';
		$version = wpua_detect_browser_version('NF-Browser');
		$code = 'netfront';
	}
	elseif (preg_match('/Ninesky-android-mobile/i', $useragent))
	{
		$link = 'http://ninesky.com/';
		$title = 'Ninesky';
		$version = wpua_detect_browser_version('Ninesky-android-mobile');
		$code = 'ninesky';
	}
	elseif (preg_match('/Nintendo 3DS/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Internet_Browser_(Nintendo_3DS)';
		$title = 'Nintendo 3DS';
		$version = '';
		$code = 'nintendo3dsbrowser';
	}
	elseif (preg_match('/NintendoBrowser/i', $useragent))
	{
		$link = 'http://www.netsurf-browser.org/';
		$title = 'Nintendo Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'nintendobrowser';
	}
	elseif (preg_match('/NokiaBrowser/i', $useragent))
	{
		$link = 'http://browser.nokia.com/';
		$title = 'Nokia Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'nokia';
	}
	elseif (preg_match('/Novarra-Vision/i', $useragent))
	{
		$link = 'http://www.novarra.com/';
		$title = 'Novarra Vision';
		$version = wpua_detect_browser_version('Vision');
		$code = 'novarra';
	}
	elseif (preg_match('/Obigo/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Obigo_Browser';
		$title = 'Obigo';
		$code = 'obigo';
	}
	elseif (preg_match('/OffByOne/i', $useragent))
	{
		$link = 'http://www.offbyone.com/';
		$title = 'Off By One';
		$version = '';
		$code = 'offbyone';
	}
	elseif (preg_match('/OmniWeb/i', $useragent))
	{
		$link = 'http://www.omnigroup.com/applications/omniweb/';
		$title = 'OmniWeb';
		$code = 'omniweb';
	}
	elseif (preg_match('/OneBrowser/i', $useragent))
	{
		$link = 'http://one-browser.com/';
		$title = 'OneBrowser';
		$code = 'onebrowser';
	}
	elseif (preg_match('/Opera Mini/i', $useragent))
	{
		$link = 'http://www.opera.com/mini/';
		$title = 'Opera Mini';
		$code = 'opera-2';
	}
	elseif (preg_match('/Opera Mobi/i', $useragent))
	{
		$link = 'http://www.opera.com/mobile/';
		if (preg_match('/Version/i', $useragent))
		{
			$version = wpua_detect_browser_version('Version');
		}
		else
		{
			$version = wpua_detect_browser_version('Opera Mobi');
		}
		$title = 'Opera Mobile';
		$code = 'opera-2';
	}
	elseif (preg_match('/Opera/i', $useragent)
		|| preg_match('/OPR/i', $useragent))
	{
		$link = 'http://www.opera.com/';
		$title = 'Opera';
		$code = 'opera-1';

		// How is version stored on this Opera ua?
		if (preg_match('/Version/i', $useragent))
		{
			$code = 'opera-2';
			$version = wpua_detect_browser_version('Version');
		}
		elseif (preg_match('/OPR/i', $useragent))
		{
			$code = 'opera-2';
			$version = wpua_detect_browser_version('OPR');
		}
		else
		{
			// Use Opera as fallback since full title may change (Next, Developer, etc.)
			$version = wpua_detect_browser_version('Opera');
		}

		// Is this one with a known alternate icon?
		if (preg_match('/Opera Labs/i', $useragent)
			|| preg_match('/Edition Labs/i', $useragent))
		{
			$code = 'opera-2-next';
		}
		elseif (preg_match('/Opera Next/i', $useragent)
			|| preg_match('/Edition Next/i', $useragent))
		{
			$code = 'opera-2-next';
		}
		elseif (preg_match('/Opera Developer/i', $useragent)
			|| preg_match('/Edition Developer/i', $useragent))
		{
			$code = 'opera-2-developer';
		}

		// Parse full edition name, ex: Opera/9.80 (X11; Linux x86_64; U; Edition Labs Camera and Pages; Ubuntu/11.10; en) Presto/2.9.220 Version/12.00
		if (preg_match('/Edition ([\ ._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= ' '.$regmatch[1];
		}
		elseif (preg_match('/Opera ([\ ._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title .= ' '.$regmatch[1];
		}

		// Use the newest icon?
		if (isset($version) && intval($version) > 13)
		{
			$code = 'opera-3';
		}
	}
	elseif (preg_match('/Orca/i', $useragent))
	{
		$link = 'http://www.orcabrowser.com/';
		$title = 'Orca';
		$code = 'orca';
	}
	elseif (preg_match('/Oregano/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Oregano_(web_browser)';
		$title = 'Oregano';
		$code = 'oregano';
	}
	elseif (preg_match('/Origyn\ Web\ Browser/i', $useragent))
	{
		$link = 'http://www.sand-labs.org/owb';
		$title = 'Oregano Web Browser';
		$version = '';
		$code = 'owb';
	}
	elseif (preg_match('/osb-browser/i', $useragent))
	{
		$link = 'http://gtk-webcore.sourceforge.net/';
		$version = wpua_detect_browser_version('osb-browser');
		$title = 'Gtk+ WebCore';
		$code = 'null';
	}
	elseif (preg_match('/Otter/i', $useragent))
	{
		$link = 'http://otter-browser.org/';
		$title = 'Otter';
		$code = 'otter';
	}
	elseif (preg_match('/\ Pre\//i', $useragent))
	{
		$link = 'http://www.palm.com/us/products/phones/pre/index.html';
		if (preg_match('/Version/i', $useragent))
		{
			$version = wpua_detect_browser_version('Version');
		}
		else
		{
			$version = wpua_detect_browser_version('Pre');
		}
		$title = 'Palm';
		$code = 'palmpre';
	}
	elseif (preg_match('/\ WebPro\//i', $useragent))
	{
		$link = 'http://www.hpwebos.com/us/support/handbooks/tungstent/webbrowser_hb.pdf';
		$title = 'Palm WebPro';
		$version = wpua_detect_browser_version('WebPro');
		$code = 'palmwebpro';
	}
	elseif (preg_match('/Palemoon/i', $useragent))
	{
		$link = 'http://www.palemoon.org/';
		$title = 'Pale Moon';
		$version = wpua_detect_browser_version('Moon');
		$code = 'palemoon';
	}
	elseif (preg_match('/Patriott\:\:Browser/i', $useragent))
	{
		$link = 'http://madgroup.x10.mx/patriott1.php';
		$title = 'Patriott Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'patriott';
	}
	elseif (preg_match('/Perk/i', $useragent))
	{
		$link = 'http://www.perk.com/';
		$title = 'Perk';
		$code = 'perk';
	}
	elseif (preg_match('/Phaseout/i', $useragent))
	{
		$link = 'http://www.phaseout.net/';
		$title = 'Phaseout';
		$version = '';
		$code = 'phaseout';
	}
	elseif (preg_match('/Phoenix/i', $useragent))
	{
		$link = 'http://www.mozilla.org/projects/phoenix/phoenix-release-notes.html';
		$title = 'Phoenix';
		$code = 'phoenix';
	}
	elseif (preg_match('/PlayStation\ 4/i', $useragent))
	{
		$link = 'http://us.playstation.com/';
		$title = 'PS4 Web Browser';
		$version = '';
		$code = 'webkit';
	}
	elseif (preg_match('/Podkicker/i', $useragent))
	{
		$link = 'http://www.podkicker.com/';
		$title = 'Podkicker';
		$code = 'podkicker';
	}
	elseif (preg_match('/Podkicker\ Pro/i', $useragent))
	{
		$link = 'http://www.podkicker.com/';
		$title = 'Podkicker Pro';
		$code = 'podkicker';
	}
	elseif (preg_match('/Pogo/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/AT%26T_Pogo';
		$title = 'Pogo';
		$code = 'pogo';
	}
	elseif (preg_match('/Polaris/i', $useragent))
	{
		$link = 'http://www.infraware.co.kr/eng/01_product/product02.asp';
		$title = 'Polaris';
		$code = 'polaris';
	}
	elseif (preg_match('/Polarity/i', $useragent))
	{
		$link = 'http://polarityweb.webs.com/';
		$title = 'Polarity';
		$code = 'polarity';
	}
	elseif (preg_match('/Prism/i', $useragent))
	{
		$link = 'http://prism.mozillalabs.com/';
		$title = 'Prism';
		$code = 'prism';
	}
	elseif (preg_match('/Puffin/i', $useragent))
	{
		$link = 'http://www.puffinbrowser.com/';
		$title = 'Puffin';
		$code = 'puffin';
	}
	elseif (preg_match('/QtWeb\ Internet\ Browser/i', $useragent))
	{
		$link = 'http://www.qtweb.net/';
		$title = 'QtWeb Internet Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'qtwebinternetbrowser';
	}
	elseif (preg_match('/QupZilla/i', $useragent))
	{
		$link = 'http://www.qupzilla.com/';
		$title = 'QupZilla';
		$code = 'qupzilla';
	}
	elseif (preg_match('/Nichrome\/self/i', $useragent))
	{
		$link = 'http://soft.rambler.ru/browser/';
		$version = wpua_detect_browser_version('Nichrome\/self');
		$title = 'Rambler browser';
		$code = 'ramblerbrowser';
	}
	elseif (preg_match('/rekonq/i', $useragent))
	{
		$link = 'http://rekonq.sourceforge.net/';
		$title = 'rekonq';
		$version = '';
		$code = 'rekonq';
	}
	elseif (preg_match('/retawq/i', $useragent))
	{
		$link = 'http://retawq.sourceforge.net/';
		$title = 'retawq';
		$code = 'terminal';
	}
	elseif (preg_match('/Roccat/i', $useragent))
	{
		$link = 'http://www.runecats.com/roccat.html';
		$title = 'Roccat';
		$code = 'roccatbrowser';
	}
	elseif (preg_match('/RockMelt/i', $useragent))
	{
		$link = 'http://www.rockmelt.com/';
		$title = 'RockMelt';
		$code = 'rockmelt';
	}
	elseif (preg_match('/Ryouko/i', $useragent))
	{
		$link = 'http://sourceforge.net/projects/ryouko/';
		$title = 'Ryouko';
		$code = 'ryouko';
	}
	elseif (preg_match('/SaaYaa/i', $useragent))
	{
		$link = 'http://www.saayaa.com/';
		$title = 'SaaYaa Explorer';
		$version = '';
		$code = 'saayaa';
	}
	elseif (preg_match('/SeaMonkey/i', $useragent))
	{
		$link = 'http://www.seamonkey-project.org/';
		$title = 'SeaMonkey';
		$code = 'seamonkey';
	}
	elseif (preg_match('/SEMC-Browser/i', $useragent))
	{
		$link = 'http://www.sonyericsson.com/';
		$title = 'SEMC Browser';
		$version = wpua_detect_browser_version('SEMC-Browser');
		$code = 'semcbrowser';
	}
	elseif (preg_match('/SEMC-java/i', $useragent))
	{
		$link = 'http://www.sonyericsson.com/';
		$title = 'SEMC-java';
		$code = 'semcbrowser';
	}
	elseif (preg_match('/Series60/i', $useragent)
		&& !preg_match('/Symbian/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Web_Browser_for_S60';
		$title = 'Nokia Series60';
		$version = wpua_detect_browser_version('Series60');
		$code = 's60';
	}
	elseif (preg_match('/S60/i', $useragent)
		&& !preg_match('/Symbian/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Web_Browser_for_S60';
		$title = 'Nokia S60';
		$version = wpua_detect_browser_version('S60');
		$code = 's60';
	}
	elseif (preg_match('/SE\ /i', $useragent)
		&& preg_match('/MetaSr/i', $useragent))
	{
		$link = 'http://ie.sogou.com/';
		$title = 'Sogou Explorer';
		$version = '';
		$code = 'sogou';
	}
	elseif (preg_match('/Seznam\.cz/i', $useragent))
	{
		$link = 'http://www.seznam.cz/prohlizec';
		$title = 'Seznam.cz';
		$version = wpua_detect_browser_version('cz');
		$code = 'seznam-cz';
	}
	elseif (preg_match('/Shiira/i', $useragent))
	{
		$link = 'http://www.shiira.jp/en.php';
		$title = 'Shiira';
		$code = 'shiira';
	}
	elseif (preg_match('/Shiretoko/i', $useragent))
	{
		$link = 'http://www.mozilla.org/';
		$title = 'Shiretoko';
		$code = 'firefoxdevpre';
	}
	elseif (preg_match('/Silk/i', $useragent)
		&& !preg_match('/PlayStation/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Amazon_Silk';
		$title = 'Amazon Silk';
		$version = wpua_detect_browser_version('Silk');
		$code = 'silk';
	}
	elseif (preg_match('/SiteKiosk/i', $useragent))
	{
		$link = 'http://www.sitekiosk.com/SiteKiosk/Default.aspx';
		$title = 'SiteKiosk';
		$code = 'sitekiosk';
	}
	elseif (preg_match('/SkipStone/i', $useragent))
	{
		$link = 'http://www.muhri.net/skipstone/';
		$title = 'SkipStone';
		$code = 'skipstone';
	}
	elseif (preg_match('/Skyfire/i', $useragent))
	{
		$link = 'http://www.skyfire.com/';
		$title = 'Skyfire';
		$code = 'skyfire';
	}
	elseif (preg_match('/Sleipnir/i', $useragent))
	{
		$link = 'http://www.fenrir-inc.com/other/sleipnir/';
		$title = 'Sleipnir';
		$code = 'sleipnir';
	}
	elseif (preg_match('/SlimBoat/i', $useragent))
	{
		$link = 'http://slimboat.com/';
		$title = 'SlimBoat';
		$code = 'slimboat';
	}
	elseif (preg_match('/SlimBrowser/i', $useragent))
	{
		$link = 'http://www.flashpeak.com/sbrowser/';
		$title = 'SlimBrowser';
		$code = 'slimbrowser';
	}
	elseif (preg_match('/SmartTV/i', $useragent))
	{
		$link = 'http://www.freethetvchallenge.com/details/faq';
		$title = 'Maple Browser';
		$version = wpua_detect_browser_version('WebBrowser');
		$code = 'maplebrowser';
	}
	elseif (preg_match('/Songbird/i', $useragent))
	{
		$link = 'http://www.getsongbird.com/';
		$title = 'Songbird';
		$code = 'songbird';
	}
	elseif (preg_match('/Stainless/i', $useragent))
	{
		$link = 'http://www.stainlessapp.com/';
		$title = 'Stainless';
		$code = 'stainless';
	}
	elseif (preg_match('/SubStream/i', $useragent))
	{
		$link = 'http://itunes.apple.com/us/app/substream/id389906706?mt=8';
		$title = 'SubStream';
		$code = 'substream';
	}
	elseif (preg_match('/Sulfur/i', $useragent))
	{
		$link = 'http://www.flock.com/';
		$title = 'Flock Sulfur';
		$version = wpua_detect_browser_version('Sulfur');
		$code = 'flock';
	}
	elseif (preg_match('/Sundance/i', $useragent))
	{
		$link = 'http://digola.com/sundance.html';
		$title = 'Sundance';
		$code = 'sundance';
	}
	elseif (preg_match('/Sundial/i', $useragent))
	{
		$link = 'http://www.sundialbrowser.com/';
		$title = 'Sundial';
		$code = 'sundial';
	}
	elseif (preg_match('/Sunrise/i', $useragent))
	{
		$link = 'http://www.sunrisebrowser.com/';
		$title = 'Sunrise';
		$code = 'sunrise';
	}
	elseif (preg_match('/Superbird/i', $useragent))
	{
		$link = 'http://superbird.me/';
		$title = 'Superbird';
		$code = 'superbird';
	}
	elseif (preg_match('/Surf/i', $useragent))
	{
		$link = 'http://surf.suckless.org/';
		$title = 'Surf';
		$code = 'surf';
	}
	elseif (preg_match('/Swiftfox/i', $useragent))
	{
		$link = 'http://www.getswiftfox.com/';
		$title = 'Swiftfox';
		$code = 'swiftfox';
	}
	elseif (preg_match('/Swiftweasel/i', $useragent))
	{
		$link = 'http://swiftweasel.tuxfamily.org/';
		$title = 'Swiftweasel';
		$code = 'swiftweasel';
	}
	elseif (preg_match('/Sylera/i', $useragent))
	{
		$link = 'http://dombla.net/sylera/';
		$title = 'Sylera';
		$code = 'null';
	}
	elseif (preg_match('/tear/i', $useragent))
	{
		$link = 'http://wiki.maemo.org/Tear';
		$title = 'Tear';
		$version = '';
		$code = 'tear';
	}
	elseif (preg_match('/TeaShark/i', $useragent))
	{
		$link = 'http://www.teashark.com/';
		$title = 'TeaShark';
		$code = 'teashark';
	}
	elseif (preg_match('/Teleca/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Obigo_Browser/';
		$title = ' Teleca';
		$code = 'obigo';
	}
	elseif (preg_match('/TenFourFox/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/TenFourFox';
		$title = 'TenFourFox';
		$version = wpua_detect_browser_version(' rv');
		$code = 'tenfourfox';
	}
	elseif (preg_match('/QtCarBrowser/i', $useragent))
	{
		$link = 'http://www.teslamotors.com/';
		$title = 'Tesla Car Browser';
		$version = '';
		$code = 'teslacarbrowser';
	}
	elseif (preg_match('/TheWorld/i', $useragent))
	{
		$link = 'http://www.ioage.com/';
		$title = 'TheWorld Browser';
		$version = '';
		$code = 'theworld';
	}
	elseif (preg_match('/Thunderbird/i', $useragent))
	{
		$link = 'http://www.mozilla.com/thunderbird/';
		$title = 'Thunderbird';
		$code = 'thunderbird';
	}
	elseif (preg_match('/Tizen/i', $useragent))
	{
		$link = 'https://www.tizen.org/';
		$title = 'Tizen';
		$code = 'tizen';
	}
	elseif (preg_match('/Tjusig/i', $useragent))
	{
		$link = 'http://www.tjusig.cz/';
		$title = 'Tjusig';
		$code = 'tjusig';
	}
	elseif (preg_match('/TencentTraveler/i', $useragent))
	{
		$link = 'http://tt.qq.com/';
		$title = 'TT Explorer';
		$version = wpua_detect_browser_version('TencentTraveler');
		$code = 'tt-explorer';
	}
	elseif (preg_match('/uBrowser/i', $useragent))
	{
		$link = 'http://www.ubrowser.com/';
		$title = 'uBrowser';
		$code = 'ubrowser';
	}
	elseif ( (preg_match('/Ubuntu\;\ Mobile/i', $useragent) || preg_match('/Ubuntu\;\ Tablet/i', $useragent) &&
		preg_match('/WebKit/i', $useragent)) )
	{
		$link = 'https://launchpad.net/webbrowser-app';
		$title = 'Ubuntu Web Browser';
		$version = '';
		$code = 'ubuntuwebbrowser';
	}
	elseif (preg_match('/UC\ Browser/i', $useragent))
	{
		$link = 'http://www.uc.cn/English/index.shtml';
		$title = 'UC Browser';
		$version = wpua_detect_browser_version('UC Browse');
		$code = 'ucbrowser';
	}
	elseif (preg_match('/UCWEB/i', $useragent))
	{
		$link = 'http://www.ucweb.com/English/product.shtml';
		$title = 'UC Browser';
		$version = wpua_detect_browser_version('UCWEB');
		$code = 'ucweb';
	}
	elseif (preg_match('/UltraBrowser/i', $useragent))
	{
		$link = 'http://www.ultrabrowser.com/';
		$title = 'UltraBrowser';
		$code = 'ultrabrowser';
	}
	elseif (preg_match('/UP.Browser/i', $useragent))
	{
		$link = 'http://www.openwave.com/';
		$title = 'Openwave Mobile Browser';
		$version = wpua_detect_browser_version('UP.Browser');
		$code = 'openwave';
	}
	elseif (preg_match('/UP.Link/i', $useragent))
	{
		$link = 'http://www.openwave.com/';
		$title = 'Openwave Mobile Browser';
		$version = wpua_detect_browser_version('UP.Link');
		$code = 'openwave';
	}
	elseif (preg_match('/Usejump/i', $useragent))
	{
		$link = 'http://www.usejump.com/';
		$title = 'Usejump';
		$code = 'usejump';
	}
	elseif (preg_match('/uZardWeb/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/UZard_Web';
		$title = 'uZardWeb';
		$code = 'uzardweb';
	}
	elseif (preg_match('/uZard/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/UZard_Web';
		$title = 'uZard';
		$code = 'uzardweb';
	}
	elseif (preg_match('/uzbl/i', $useragent))
	{
		$link = 'http://www.uzbl.org/';
		$title = 'uzbl';
		$code = 'uzbl';
	}
	elseif (preg_match('/Vivaldi/i', $useragent))
	{
		$link = 'http://vivaldi.com/';
		$title = 'Vivaldi';
		$code = 'vivaldi';
	}
	elseif (preg_match('/Vimprobable/i', $useragent))
	{
		$link = 'http://www.vimprobable.org/';
		$title = 'Vimprobable';
		$code = 'null';
	}
	elseif (preg_match('/Vonkeror/i', $useragent))
	{
		$link = 'http://zzo38computer.cjb.net/vonkeror/';
		$title = 'Vonkeror';
		$code = 'null';
	}
	elseif (preg_match('/w3m/i', $useragent))
	{
		$link = 'http://w3m.sourceforge.net/';
		$title = 'W3M';
		$code = 'w3m';
	}
	elseif (preg_match('/AppleWebkit/i', $useragent)
		&& preg_match('/WebPositive/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/WebPositive';
		$title = 'WebPositive';
		$code = 'webpositive';
	}
	elseif (preg_match('/AppleWebkit/i', $useragent)
		&& preg_match('/Android/i', $useragent)
		&& !preg_match('/Chrome/i', $useragent))
	{
		$link = 'http://developer.android.com/reference/android/webkit/package-summary.html';
		$title = 'Android Webkit';
		$version = wpua_detect_browser_version('Version');
		$code = 'android-webkit';
	}
	elseif (preg_match('/Waterfox/i', $useragent))
	{
		$link = 'http://www.waterfoxproject.org/';
		$title = 'Waterfox';
		$code = 'waterfox';
	}
	elseif (preg_match('/WebExplorer/i', $useragent))
	{
		$link = 'http://webexplorerbrasil.com/';
		$title = 'Web Explorer';
		$version = wpua_detect_browser_version('Explorer');
		$code = 'webexplorer';
	}
	elseif (preg_match('/WebianShell/i', $useragent))
	{
		$link = 'http://webian.org/shell/';
		$title = 'Webian Shell';
		$version = wpua_detect_browser_version('Shell');
		$code = 'webianshell';
	}
	elseif (preg_match('/Webrender/i', $useragent))
	{
		$link = 'http://webrender.99k.org/';
		$title = 'Webrender';
		$version = '';
		$code = 'webrender';
	}
	elseif (preg_match('/Chrome/i', $useragent)
		&& preg_match('/Mobile/i', $useragent)
		&& ( preg_match('/Version/i', $useragent)
			|| preg_match('/wv/i', $useragent) ))
	{
		// https://developer.chrome.com/multidevice/user-agent
		$link = 'https://developer.chrome.com/multidevice/webview/overview';
		$title = 'WebView';
		$version = wpua_detect_browser_version('Version');
		$code = 'android-webkit';
	}
	elseif (preg_match('/WeltweitimnetzBrowser/i', $useragent))
	{
		$link = 'http://weltweitimnetz.de/software/Browser.en.page';
		$title = 'Weltweitimnetz Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'weltweitimnetzbrowser';
	}
	elseif (preg_match('/wKiosk/i', $useragent))
	{
		$link = 'http://www.app4mac.com/store/index.php?target=products&product_id=9';
		$title = 'wKiosk';
		$version = '';
		$code = 'wkiosk';
	}
	elseif (preg_match('/WorldWideWeb/i', $useragent))
	{
		$link = 'http://www.w3.org/People/Berners-Lee/WorldWideWeb.html';
		$title = 'WorldWideWeb';
		$code = 'worldwideweb';
	}
	elseif (preg_match('/wOSBrowser/i', $useragent)
		|| preg_match('/webOSBrowser/i', $useragent))
	{
		$link = 'http://www.hp.com/';
		$title = 'wOSBrowser';
		$version = wpua_detect_browser_version('OSBrowser');
		$code = 'webos';
	}
	elseif (preg_match('/wp-android/i', $useragent))
	{
		$link = 'http://android.wordpress.org/';
		$version = wpua_detect_browser_version('wp-android'); //TODO check into Android version being returned
		$title = 'Wordpress App';
		$code = 'wordpress';
	}
	elseif (preg_match('/wp-blackberry/i', $useragent))
	{
		$link = 'http://blackberry.wordpress.org/';
		$title = 'wp-blackberry';
		$code = 'wordpress';
	}
	elseif (preg_match('/wp-iphone/i', $useragent))
	{
		$link = 'http://ios.wordpress.org/';
		$title = 'Wordpress App';
		$version = wpua_detect_browser_version('wp-iphone');
		$code = 'wordpress';
	}
	elseif (preg_match('/wp-nokia/i', $useragent))
	{
		$link = 'http://nokia.wordpress.org/';
		$title = 'wp-nokia';
		$code = 'wordpress';
	}
	elseif (preg_match('/wp-webos/i', $useragent))
	{
		$link = 'http://webos.wordpress.org/';
		$title = 'wp-webos';
		$code = 'wordpress';
	}
	elseif (preg_match('/wp-windowsphone/i', $useragent))
	{
		$link = 'http://windowsphone.wordpress.org/';
		$title = 'wp-windowsphone';
		$code = 'wordpress';
	}
	elseif (preg_match('/Wyzo/i', $useragent))
	{
		$link = 'http://www.wyzo.com/';
		$title = 'Wyzo';
		$code = 'Wyzo';
	}
	elseif (preg_match('/X-Smiles/i', $useragent))
	{
		$link = 'http://www.xsmiles.org/';
		$title = 'X-Smiles';
		$code = 'x-smiles';
	}
	elseif (preg_match('/Xiino/i', $useragent))
	{
		$link = '#';
		$title = 'Xiino';
		$code = 'null';
	}
	elseif (preg_match('/YaBrowser/i', $useragent))
	{
		$link = 'http://browser.yandex.com/';
		$title = 'Yandex Browser';
		$version = wpua_detect_browser_version('Browser');
		$code = 'yandex';
	}
	elseif (preg_match('/YRCWeblink/i', $useragent))
	{
		$link = 'http://weblink.justyrc.com/';
		$title = 'YRC Weblink';
		$version = wpua_detect_browser_version('Weblink');
		$code = 'yrcweblink';
	}
	elseif (preg_match('/zBrowser/i', $useragent))
	{
		$link = 'http://sites.google.com/site/zeromusparadoxe01/zbrowser';
		$title = 'zBrowser';
		$code = 'zbrowser';
	}
	elseif (preg_match('/ZipZap/i', $useragent))
	{
		$link = 'http://www.zipzaphome.com/';
		$title = 'ZipZap';
		$code = 'zipzap';
	}

	// Pulled out of order to help ensure better detection for above browsers
	elseif (preg_match('/ABrowse/i', $useragent))
	{
		$link = 'http://abrowse.sourceforge.net/';
		$title = 'ABrowse';
		$code = 'abrowse';
	}
	elseif (preg_match('/Edge/i', $useragent)
		&& preg_match('/Chrome/i', $useragent)
		&& preg_match('/Safari/i', $useragent))
	{
		$link = 'http://en.wikipedia.org/wiki/Microsoft_Edge';
		$title = 'Microsoft Edge';
		$version = wpua_detect_browser_version('Edge');
		$code = 'msedge12';
	}
	elseif (preg_match('/Chrome/i', $useragent))
	{
		$link = 'http://google.com/chrome/';
		$title = 'Google Chrome';
		$version = wpua_detect_browser_version('Chrome');
		$code = 'chrome';
	}
	elseif (preg_match('/Safari/i', $useragent)
		&& !preg_match('/Nokia/i', $useragent))
	{
		$link = 'http://www.apple.com/safari/';
		$title = 'Safari';

		if (preg_match('/Version/i', $useragent))
		{
			$version = wpua_detect_browser_version('Version');
		}

		if (preg_match('/Mobile Safari/i', $useragent))
		{
			$title = 'Mobile '.$title;
		}

		$code = 'safari';
	}
	elseif (preg_match('/Nokia/i', $useragent))
	{
		$link = 'http://www.nokia.com/browser';
		$title = 'Nokia Web Browser';
		$version = '';
		$code = 'maemo';
	}
	elseif (preg_match('/Firefox/i', $useragent))
	{
		$link = 'http://www.mozilla.org/';
		$title = 'Firefox';
		$code = 'firefox';
	}
	elseif (preg_match('/MSIE/i', $useragent) || preg_match('/Trident/i', $useragent))
	{
		$link = 'http://www.microsoft.com/windows/products/winfamily/ie/default.mspx';
		$title = 'Internet Explorer';

		if (preg_match('/\ rv:([.0-9a-zA-Z]+)/i', $useragent))
		{
			// IE11 or newer
			$version = wpua_detect_browser_version(' rv');
		}
		else
		{
			// IE10 or older, regex: '/MSIE[\ |\/]?([.0-9a-zA-Z]+)/i'
			$version = wpua_detect_browser_version('MSIE');
		}

		if (intval($version) >= 10)
		{
			$code = 'msie10';
		}
		elseif (intval($version) >= 9)
		{
			$code = 'msie9';
		}
		elseif (intval($version) >= 7)
		{
			// also ie8
			$code = 'msie7';

			// Detect compatibility mode for IE
			if ($version === '7.0' && preg_match('/Trident\/4.0/i', $useragent))
			{
				$version = '8.0 (Compatibility Mode)'; // Fix for IE8 quirky UA string with Compatibility Mode enabled
			}
		}
		elseif (intval($version) >= 6)
		{
			$code = 'msie6';
		}
		elseif (intval($version) >= 4)
		{
			// also ie5
			$code = 'msie4';
		}
		elseif (intval($version) >= 3)
		{
			$code = 'msie3';
		}
		elseif (intval($version) >= 2)
		{
			$code = 'msie2';
		}
		elseif (intval($version) >= 1)
		{
			$code = 'msie1';
		}
		else
		{
			$code = 'msie';
		}
	}
	elseif (preg_match('/Mozilla/i', $useragent))
	{
		$link = 'http://www.mozilla.org/';
		$title = 'Mozilla';
		$version = wpua_detect_browser_version(' rv');

		if (empty($version))
		{
			$title .= ' Compatible';
		}

		$code = 'mozilla';
	}

	// No Web browser match
	else
	{
		$link = '#';
		$title = 'Unknown';
		$version = '';
		$code = 'null';
	}

	// Set version if it hasn't been parsed yet (generic structure)...
	if (is_null($version))
	{
		$version = wpua_detect_browser_version($title);
	}

	// Append version to title (as long as show version isn't 'off')
	if ($wpua_show_version !== 'false')
	{
		$title .= " $version";
	}

	return wpua_get_icon_text($link, $title, $code, '/net/');
}

?>
