<?php
/**
 * Página "Acerca de" de HowPath.
 * Se muestra con el shortcode [howpath_about]. Usa los mismos estilos base que el inicio.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hp_contacto  = home_url( '/contact/' );
$hp_servicios = home_url( '/services/' );
?>
<div class="hp-home hp-home--bleed hp-about">

	<!-- PORTADA -->
	<section class="hp-hero hp-grid-bg">
		<div class="hp-hero__vignette" aria-hidden="true"></div>
		<div class="hp-wrap hp-hero__layout">

			<div class="hp-hero__copy">
				<p class="hp-pill hp-pill--dark">
					<span class="hp-pill__dot" aria-hidden="true"></span>
					Acerca de HowPath
				</p>

				<h1 class="hp-hero__title">
					Encontramos el cómo. <span class="hp-gradient-text">Construimos el camino.</span>
				</h1>

				<p class="hp-hero__lead">
					HowPath Growth Systems es una firma de crecimiento digital. Integramos estrategia, tecnología, datos, creatividad y ejecución para convertir los retos de tu empresa en sistemas de crecimiento medibles.
				</p>

				<div class="hp-actions">
					<a class="hp-btn hp-btn--primary" href="<?php echo esc_url( $hp_contacto ); ?>">
						Contáctanos <?php echo howpath_icon( 'arrow-right' ); ?>
					</a>
					<a class="hp-btn hp-btn--ghost" href="<?php echo esc_url( $hp_servicios ); ?>">Ver servicios</a>
				</div>
			</div>

			<div class="hp-hero__visual" aria-hidden="true">
				<div class="hp-hero__glow"></div>
				<div class="hp-panel hp-route">
					<div class="hp-panel__bar">
						<span class="hp-panel__dots"><i></i><i></i><i></i></span>
						<span class="hp-panel__name">howpath · del objetivo al resultado</span>
					</div>

					<div class="hp-route__stop">
						<span class="hp-route__label">Intención</span>
						<span class="hp-route__text">Sabes a dónde quiere llegar tu empresa.</span>
					</div>

					<div class="hp-route__path">
						<span class="hp-route__line"></span>
						<span class="hp-route__core">
							<span class="hp-route__how">HOW</span>
							<span class="hp-route__plus">+</span>
							<span class="hp-route__pathword">PATH</span>
						</span>
						<span class="hp-route__line"></span>
					</div>

					<div class="hp-route__stop hp-route__stop--end">
						<span class="hp-route__label">Resultado</span>
						<span class="hp-route__text">Crecimiento medible, repetible y escalable.</span>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- EL NOMBRE -->
	<section class="hp-section hp-section--ink" id="nombre">
		<div class="hp-wrap">
			<header class="hp-head hp-head--center">
				<p class="hp-pill">Nuestro nombre</p>
				<h2 class="hp-head__title">Dos palabras, una forma de trabajar</h2>
				<p class="hp-head__text">Muchas empresas saben a dónde quieren llegar, pero no siempre conocen el camino correcto para lograrlo. Nuestro nombre resume cómo lo resolvemos.</p>
			</header>

			<div class="hp-name">
				<article class="hp-name__card">
					<span class="hp-name__word">HOW</span>
					<h3 class="hp-name__title">El cómo</h3>
					<p>La estrategia y el método. Analizamos, decidimos y encontramos la forma más eficiente de alcanzar un objetivo.</p>
					<div class="hp-tags"><span>Estrategia</span><span>Método</span><span>Análisis</span><span>Decisiones</span></div>
				</article>

				<span class="hp-name__join" aria-hidden="true">+</span>

				<article class="hp-name__card hp-name__card--accent">
					<span class="hp-name__word">PATH</span>
					<h3 class="hp-name__title">El camino</h3>
					<p>La ruta y la ejecución. Construimos los sistemas y hacemos el trabajo que lleva a tu empresa a crecer de forma sostenida.</p>
					<div class="hp-tags"><span>Dirección</span><span>Implementación</span><span>Ejecución</span><span>Crecimiento</span></div>
				</article>
			</div>

			<p class="hp-name__claim">No prometemos magia: <strong>prometemos método.</strong></p>
		</div>
	</section>

	<!-- POR QUÉ EXISTIMOS -->
	<section class="hp-section hp-section--card" id="por-que">
		<div class="hp-wrap hp-why">
			<div class="hp-why__copy">
				<header class="hp-head">
					<p class="hp-pill">Por qué existimos</p>
					<h2 class="hp-head__title">El crecimiento no se improvisa. Se construye.</h2>
					<p class="hp-head__text">Muchas empresas invierten en marketing digital con acciones aisladas: una campaña aquí, una herramienta allá, un reporte que nadie usa para decidir. Marketing, ventas y tecnología trabajan por separado, y una parte de la inversión se pierde en el camino.</p>
				</header>

				<ul class="hp-why__list">
					<li><?php echo howpath_icon( 'arrow-right' ); ?> Inversión en marketing sin claridad sobre su retorno.</li>
					<li><?php echo howpath_icon( 'arrow-right' ); ?> Prospectos que se pierden por falta de seguimiento.</li>
					<li><?php echo howpath_icon( 'arrow-right' ); ?> Herramientas que no se comunican entre sí.</li>
					<li><?php echo howpath_icon( 'arrow-right' ); ?> Reportes que no explican el impacto en las ventas.</li>
				</ul>
			</div>

			<blockquote class="hp-manifesto">
				<p class="hp-manifesto__label">Manifiesto</p>
				<p>En HowPath creemos que siempre existe una forma mejor de crecer.</p>
				<p>Pero encontrarla requiere más que ideas. Requiere estrategia, datos, tecnología, ejecución y mejora continua.</p>
				<p>Por eso no trabajamos con soluciones aisladas. Diseñamos caminos completos: pensamos la estrategia, construimos el sistema y ejecutamos las acciones que convierten el crecimiento en algo medible, repetible y escalable.</p>
				<p class="hp-manifesto__close">HowPath es el camino entre la intención y el resultado.</p>
			</blockquote>
		</div>
	</section>

	<!-- CÓMO PENSAMOS -->
	<section class="hp-section hp-section--ink" id="como-pensamos">
		<div class="hp-wrap">
			<header class="hp-head hp-head--center">
				<p class="hp-pill">Cómo pensamos</p>
				<h2 class="hp-head__title">Tres principios guían cada proyecto</h2>
			</header>

			<ol class="hp-process hp-principles">
				<li class="hp-process__item">
					<span class="hp-process__num">1</span>
					<h3>Pensar antes de ejecutar</h3>
					<p>Entendemos el negocio, los objetivos y los recursos antes de proponer una sola acción. Así evitamos invertir en lo que no mueve los resultados.</p>
				</li>
				<li class="hp-process__item">
					<span class="hp-process__num">2</span>
					<h3>Construir antes de escalar</h3>
					<p>Primero conectamos la tecnología, los procesos y la medición. Escalar sobre una base débil solo multiplica el desperdicio.</p>
				</li>
				<li class="hp-process__item">
					<span class="hp-process__num">3</span>
					<h3>Medir para mejorar</h3>
					<p>Cada acción se mide por su impacto comercial. Lo que funciona se escala; lo que no, se corrige.</p>
				</li>
			</ol>
		</div>
	</section>

	<!-- PERSONALIDAD -->
	<section class="hp-section hp-section--card" id="como-trabajamos">
		<div class="hp-wrap">
			<header class="hp-head hp-head--center">
				<p class="hp-pill">Cómo trabajamos</p>
				<h2 class="hp-head__title">Un socio estratégico que también ejecuta</h2>
				<p class="hp-head__text">Esto es lo que puedes esperar al trabajar con nosotros.</p>
			</header>

			<div class="hp-traits">
				<article class="hp-trait">
					<span class="hp-trait__icon"><?php echo howpath_icon( 'route' ); ?></span>
					<h3>Estratégicos</h3>
					<p>Entendemos tus objetivos de negocio antes de proponer cualquier acción.</p>
				</article>
				<article class="hp-trait">
					<span class="hp-trait__icon"><?php echo howpath_icon( 'cpu' ); ?></span>
					<h3>Técnicos</h3>
					<p>Dominamos las plataformas, los datos y la automatización que sostienen el crecimiento.</p>
				</article>
				<article class="hp-trait">
					<span class="hp-trait__icon"><?php echo howpath_icon( 'sliders' ); ?></span>
					<h3>Claros</h3>
					<p>Traducimos lo complejo en información que la dirección puede usar para decidir.</p>
				</article>
				<article class="hp-trait">
					<span class="hp-trait__icon"><?php echo howpath_icon( 'bolt' ); ?></span>
					<h3>Ejecutores</h3>
					<p>No nos quedamos en el diagnóstico ni en la presentación: implementamos.</p>
				</article>
				<article class="hp-trait">
					<span class="hp-trait__icon"><?php echo howpath_icon( 'refresh' ); ?></span>
					<h3>Evolutivos</h3>
					<p>Medimos, aprendemos y mejoramos continuamente lo que construimos.</p>
				</article>
			</div>
		</div>
	</section>

	<!-- PARA QUIÉN -->
	<section class="hp-section hp-section--ink" id="para-quien">
		<div class="hp-wrap hp-values">
			<div class="hp-values__copy">
				<header class="hp-head">
					<p class="hp-pill">Para quién trabajamos</p>
					<h2 class="hp-head__title">Empresas que crecieron y necesitan un sistema a su altura</h2>
					<p class="hp-head__text">Trabajamos con empresas medianas y grandes en México que buscan soluciones estructuradas, y con los equipos directivos que toman las decisiones de crecimiento.</p>
				</header>

				<div class="hp-roles">
					<span>CEO y dirección general</span>
					<span>Dirección comercial</span>
					<span>Dirección de marketing</span>
					<span>Dirección de tecnología</span>
					<span>Transformación digital</span>
				</div>

				<a class="hp-link hp-about__services-link" href="<?php echo esc_url( $hp_servicios ); ?>">Conoce nuestras cinco áreas de servicio <?php echo howpath_icon( 'arrow-right' ); ?></a>
			</div>

			<div class="hp-matrix hp-fit">
				<div class="hp-matrix__bar">
					<span><i class="hp-matrix__dot" aria-hidden="true"></i> HowPath es para ti si…</span>
				</div>
				<ul class="hp-fit__list">
					<li><?php echo howpath_icon( 'check-circle' ); ?> Inviertes en marketing, pero no sabes con claridad qué canal genera ventas.</li>
					<li><?php echo howpath_icon( 'check-circle' ); ?> Generas prospectos que tu equipo comercial no alcanza a atender o dar seguimiento.</li>
					<li><?php echo howpath_icon( 'check-circle' ); ?> Tus herramientas de marketing, ventas y datos no están conectadas.</li>
					<li><?php echo howpath_icon( 'check-circle' ); ?> Tu empresa creció, pero tu infraestructura digital no lo hizo al mismo ritmo.</li>
					<li><?php echo howpath_icon( 'check-circle' ); ?> Necesitas información confiable para tomar decisiones comerciales.</li>
				</ul>
			</div>
		</div>
	</section>

	<!-- LLAMADO FINAL -->
	<section class="hp-cta" id="contacto">
		<div class="hp-cta__glow hp-cta__glow--orange" aria-hidden="true"></div>
		<div class="hp-cta__glow hp-cta__glow--slate" aria-hidden="true"></div>
		<div class="hp-wrap hp-cta__inner">
			<p class="hp-pill">Pensamos, construimos y ejecutamos</p>
			<h2 class="hp-cta__title">
				¿Listo para encontrar<br>
				<span class="hp-gradient-text">el camino de tu empresa?</span>
			</h2>
			<p class="hp-cta__text">Cuéntanos tus objetivos y diseñemos juntos el sistema para alcanzarlos.</p>
			<div class="hp-actions hp-actions--center">
				<a class="hp-btn hp-btn--primary hp-btn--lg" href="<?php echo esc_url( $hp_contacto ); ?>">
					Contáctanos <?php echo howpath_icon( 'arrow-right' ); ?>
				</a>
				<a class="hp-btn hp-btn--ghost hp-btn--lg" href="<?php echo esc_url( $hp_servicios ); ?>">Ver servicios</a>
			</div>
		</div>
	</section>

</div>
