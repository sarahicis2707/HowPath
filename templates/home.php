<?php
/**
 * Página de inicio de HowPath.
 * Se muestra con el shortcode [howpath_home]. El encabezado y el pie de página son los de Astra.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hp_contacto = home_url( '/contact/' );
?>
<div class="hp-home">

	<!-- PORTADA -->
	<section class="hp-hero hp-grid-bg">
		<div class="hp-hero__vignette" aria-hidden="true"></div>
		<div class="hp-wrap hp-hero__layout">

			<div class="hp-hero__copy">
				<p class="hp-pill hp-pill--dark">
					<span class="hp-pill__dot" aria-hidden="true"></span>
					Sistemas de crecimiento B2B
				</p>

				<h1 class="hp-hero__title">
					Impulsa tu <span class="hp-gradient-text">crecimiento digital</span> hoy
				</h1>

				<p class="hp-hero__lead">
					Diseñamos y ejecutamos sistemas que conectan estrategia, tecnología, marketing y datos para convertir los retos de tu empresa en resultados medibles.
				</p>

				<div class="hp-actions">
					<a class="hp-btn hp-btn--primary" href="<?php echo esc_url( $hp_contacto ); ?>">
						Contáctanos <?php echo howpath_icon( 'arrow-right' ); ?>
					</a>
					<a class="hp-btn hp-btn--ghost" href="#servicios">Explorar servicios</a>
				</div>

				<ul class="hp-hero__proof">
					<li><?php echo howpath_icon( 'check-circle' ); ?> Metodología orientada a resultados de negocio</li>
					<li><?php echo howpath_icon( 'check-circle' ); ?> Integración de CRM y automatización</li>
					<li><?php echo howpath_icon( 'check-circle' ); ?> Decisiones basadas en datos</li>
				</ul>
			</div>

			<div class="hp-hero__visual" aria-hidden="true">
				<div class="hp-hero__glow"></div>

				<div class="hp-float hp-float--top">
					<span class="hp-float__icon"><?php echo howpath_icon( 'trend-up' ); ?></span>
					<span>
						<span class="hp-float__label">Atribución</span>
						<span class="hp-float__value">Por canal y campaña</span>
					</span>
				</div>

				<div class="hp-panel">
					<div class="hp-panel__bar">
						<span class="hp-panel__dots"><i></i><i></i><i></i></span>
						<span class="hp-panel__name">howpath · panel de crecimiento</span>
						<span class="hp-panel__chip">Vista ilustrativa</span>
					</div>

					<div class="hp-panel__metrics">
						<div class="hp-metric">
							<span class="hp-metric__label">Tráfico calificado</span>
							<span class="hp-metric__bars"><i style="height:35%"></i><i style="height:55%"></i><i style="height:48%"></i><i style="height:72%"></i><i style="height:90%"></i></span>
						</div>
						<div class="hp-metric">
							<span class="hp-metric__label">Prospectos calificados</span>
							<span class="hp-metric__bars"><i style="height:30%"></i><i style="height:42%"></i><i style="height:60%"></i><i style="height:66%"></i><i style="height:84%"></i></span>
						</div>
						<div class="hp-metric">
							<span class="hp-metric__label">Costo de adquisición</span>
							<span class="hp-metric__bars hp-metric__bars--down"><i style="height:88%"></i><i style="height:74%"></i><i style="height:66%"></i><i style="height:52%"></i><i style="height:40%"></i></span>
						</div>
					</div>

					<div class="hp-chart">
						<div class="hp-chart__head">
							<span><?php echo howpath_icon( 'chart-line' ); ?> Recorrido del embudo comercial</span>
							<span class="hp-chart__tag">Marketing + ventas</span>
						</div>
						<svg class="hp-chart__svg" viewBox="0 0 520 220" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
							<defs>
								<pattern id="hpInnerGrid" width="40" height="40" patternUnits="userSpaceOnUse">
									<path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(27, 46, 79, 0.45)" stroke-width="1"></path>
								</pattern>
								<linearGradient id="hpOrangeArea" x1="0" y1="0" x2="0" y2="1">
									<stop offset="0%" stop-color="#FF5B2E" stop-opacity="0.30"></stop>
									<stop offset="60%" stop-color="#FF5B2E" stop-opacity="0.07"></stop>
									<stop offset="100%" stop-color="#FF5B2E" stop-opacity="0"></stop>
								</linearGradient>
								<marker id="hpArrow" viewBox="0 0 12 12" refX="8" refY="6" markerWidth="9" markerHeight="9" orient="auto-start-reverse">
									<path d="M 0 1.5 L 10 6 L 0 10.5 z" fill="#FF5B2E"></path>
								</marker>
							</defs>
							<rect width="100%" height="100%" fill="url(#hpInnerGrid)"></rect>
							<line x1="20" y1="90" x2="500" y2="90" stroke="#1B2A47" stroke-width="1.5" stroke-dasharray="4 4"></line>
							<text x="30" y="84" fill="#94A3B8" font-size="10" font-family="Inter, sans-serif">OBJETIVO COMERCIAL</text>
							<path d="M 25 185 L 85 155 L 135 175 L 185 125 L 235 145 L 280 100 L 320 115 L 475 35 L 475 210 L 25 210 Z" fill="url(#hpOrangeArea)"></path>
							<path class="hp-chart__line" d="M 25 185 L 85 155 L 135 175 L 185 125 L 235 145 L 280 100 L 320 115 L 475 35" stroke="#FF5B2E" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" marker-end="url(#hpArrow)"></path>
							<circle cx="85" cy="155" r="3.5" fill="#0A0E1A" stroke="#FF5B2E" stroke-width="2"></circle>
							<circle cx="185" cy="125" r="3.5" fill="#0A0E1A" stroke="#FF5B2E" stroke-width="2"></circle>
							<circle cx="280" cy="100" r="3.5" fill="#0A0E1A" stroke="#FF5B2E" stroke-width="2"></circle>
							<circle class="hp-chart__pulse" cx="475" cy="35" r="9" fill="#FF5B2E" opacity="0.35"></circle>
							<circle cx="475" cy="35" r="3.5" fill="#F5EFDF"></circle>
						</svg>
						<div class="hp-chart__stages">
							<span>Diagnóstico</span><span>Implementación</span><span>Captación</span><span>Optimización</span><span class="is-accent">Escala</span>
						</div>
					</div>

					<div class="hp-panel__note">
						<span class="hp-panel__note-icon"><?php echo howpath_icon( 'bolt' ); ?></span>
						<span>
							<strong>Prospectos sincronizados con el CRM</strong>
							<span>Cada solicitud llega al asesor correcto, con su origen registrado.</span>
						</span>
					</div>
				</div>

				<div class="hp-float hp-float--bottom">
					<span class="hp-float__icon hp-float__icon--accent"><?php echo howpath_icon( 'target' ); ?></span>
					<span>
						<span class="hp-float__label">Seguimiento</span>
						<span class="hp-float__value">Automatizado de punta a punta</span>
					</span>
				</div>
			</div>

		</div>
	</section>

	<!-- SERVICIOS -->
	<section class="hp-section hp-section--ink" id="servicios">
		<div class="hp-wrap">
			<header class="hp-head hp-head--center">
				<p class="hp-pill">Nuestros servicios</p>
				<h2 class="hp-head__title">Un sistema conectado para escalar</h2>
				<p class="hp-head__text">Conectamos marketing, ventas y tecnología a través de cinco áreas que trabajan como un solo sistema de crecimiento.</p>
			</header>

			<div class="hp-services">

				<article class="hp-card">
					<div class="hp-card__top">
						<span class="hp-card__num">01</span>
						<span class="hp-card__icon"><?php echo howpath_icon( 'route' ); ?></span>
					</div>
					<h3 class="hp-card__title">Strategy</h3>
					<p class="hp-card__kicker">Estrategia y dirección de crecimiento</p>
					<p class="hp-card__text">Diagnosticamos tu operación digital, definimos objetivos e indicadores y trazamos la hoja de ruta para invertir solo en lo que mueve el negocio.</p>
					<div class="hp-mini hp-mini--flow">
						<span>Diagnóstico</span><?php echo howpath_icon( 'arrow-right' ); ?><span>KPIs</span><?php echo howpath_icon( 'arrow-right' ); ?><span class="is-accent">Roadmap</span>
					</div>
					<div class="hp-tags"><span>Diagnóstico</span><span>KPIs</span><span>Customer journey</span><span>Roadmap</span></div>
				</article>

				<article class="hp-card">
					<div class="hp-card__top">
						<span class="hp-card__num">02</span>
						<span class="hp-card__icon"><?php echo howpath_icon( 'layers' ); ?></span>
					</div>
					<h3 class="hp-card__title">Stack</h3>
					<p class="hp-card__kicker">Tecnología e integración</p>
					<p class="hp-card__text">Implementamos y conectamos CRM, automatizaciones, WhatsApp Business y medición para que ningún prospecto se pierda entre herramientas.</p>
					<div class="hp-mini hp-mini--chips">
						<span>CRM</span><?php echo howpath_icon( 'link' ); ?><span>Flujos</span><?php echo howpath_icon( 'link' ); ?><span>Datos</span>
					</div>
					<div class="hp-tags"><span>CRM</span><span>Automatización</span><span>Integraciones</span><span>Tracking</span></div>
				</article>

				<article class="hp-card">
					<div class="hp-card__top">
						<span class="hp-card__num">03</span>
						<span class="hp-card__icon"><?php echo howpath_icon( 'chart-line' ); ?></span>
					</div>
					<h3 class="hp-card__title">Growth</h3>
					<p class="hp-card__kicker">Captación y optimización</p>
					<p class="hp-card__text">Ejecutamos campañas en Meta Ads y Google Ads enfocadas en prospectos calificados, y optimizamos embudos y landing pages con pruebas constantes.</p>
					<div class="hp-mini hp-mini--split">
						<span>Tráfico calificado</span><?php echo howpath_icon( 'arrow-right' ); ?><span class="is-accent">Oportunidades</span>
					</div>
					<div class="hp-tags"><span>Paid media</span><span>Funnels B2B</span><span>CRO</span><span>Pruebas A/B</span></div>
				</article>

				<article class="hp-card">
					<div class="hp-card__top">
						<span class="hp-card__num">04</span>
						<span class="hp-card__icon"><?php echo howpath_icon( 'pie' ); ?></span>
					</div>
					<h3 class="hp-card__title">Intelligence</h3>
					<p class="hp-card__kicker">Medición y datos</p>
					<p class="hp-card__text">Centralizamos tus indicadores en tableros ejecutivos claros para saber qué funciona, dónde se desperdicia inversión y qué decisión tomar después.</p>
					<div class="hp-mini hp-mini--bars">
						<i style="height:10px"></i><i style="height:16px"></i><i class="is-accent" style="height:22px"></i>
						<span>Tablero para dirección</span>
					</div>
					<div class="hp-tags"><span>Dashboards</span><span>Atribución</span><span>KPIs</span><span>Reportes</span></div>
				</article>

				<article class="hp-card">
					<div class="hp-card__top">
						<span class="hp-card__num">05</span>
						<span class="hp-card__icon"><?php echo howpath_icon( 'sparkles' ); ?></span>
					</div>
					<h3 class="hp-card__title">Studio</h3>
					<p class="hp-card__kicker">Creatividad orientada a resultados</p>
					<p class="hp-card__text">Creamos anuncios, videos, copies y landing pages pensados para tu público, su etapa en el embudo y el objetivo de cada campaña.</p>
					<div class="hp-mini hp-mini--split">
						<span>Concepto y copy</span><span class="hp-mini__badge">Orientado a conversión</span>
					</div>
					<div class="hp-tags"><span>Creativos</span><span>Video</span><span>Copywriting</span><span>Landing pages</span></div>
				</article>

				<article class="hp-card hp-card--cta">
					<span class="hp-card__bg-icon" aria-hidden="true"><?php echo howpath_icon( 'trend-up' ); ?></span>
					<span class="hp-card__icon hp-card__icon--accent"><?php echo howpath_icon( 'arrow-up-right' ); ?></span>
					<h3 class="hp-card__title">¿Listo para conectar tu sistema comercial?</h3>
					<p class="hp-card__text">Revisamos tu operación digital y te mostramos dónde se están perdiendo oportunidades entre marketing, ventas y tecnología.</p>
					<a class="hp-btn hp-btn--primary hp-btn--block" href="<?php echo esc_url( $hp_contacto ); ?>">
						Solicitar diagnóstico <?php echo howpath_icon( 'arrow-right' ); ?>
					</a>
				</article>

			</div>
		</div>
	</section>

	<!-- PROSPECTOS -->
	<section class="hp-section hp-section--card" id="metodologia">
		<div class="hp-wrap">
			<div class="hp-box">
				<div class="hp-box__glow" aria-hidden="true"></div>

				<header class="hp-head">
					<p class="hp-pill">Trazabilidad completa</p>
					<h2 class="hp-head__title">¿Qué pasa con los prospectos que generan tus campañas?</h2>
					<p class="hp-head__text">Conectamos tus campañas con el seguimiento de ventas para que tu equipo sepa de dónde llegó cada oportunidad, quién la atendió y qué resultado generó.</p>
				</header>

				<div class="hp-steps">
					<div class="hp-steps__line" aria-hidden="true"></div>

					<div class="hp-step">
						<span class="hp-step__num">1</span>
						<h3 class="hp-step__title">Captación</h3>
						<p class="hp-step__text">Un prospecto ve tu anuncio o contenido y solicita información o una reunión.</p>
						<p class="hp-step__tech"><?php echo howpath_icon( 'tag' ); ?> UTM y eventos de conversión</p>
					</div>

					<div class="hp-step hp-step--featured">
						<span class="hp-step__badge">Automatizado</span>
						<span class="hp-step__num hp-step__num--accent">2</span>
						<h3 class="hp-step__title">Seguimiento</h3>
						<p class="hp-step__text">La solicitud entra al CRM al instante, se asigna al asesor indicado y activa los mensajes de seguimiento.</p>
						<p class="hp-step__tech"><?php echo howpath_icon( 'split' ); ?> Asignación de prospectos y WhatsApp</p>
					</div>

					<div class="hp-step">
						<span class="hp-step__num hp-step__num--slate">3</span>
						<h3 class="hp-step__title">Medición y cierre</h3>
						<p class="hp-step__text">Cuando se cierra la venta, esa información regresa a las campañas para atraer prospectos con el mismo perfil.</p>
						<p class="hp-step__tech"><?php echo howpath_icon( 'chart-bar' ); ?> Atribución de ingresos</p>
					</div>
				</div>

				<div class="hp-box__foot">
					<p><?php echo howpath_icon( 'check-circle' ); ?> Menos prospectos perdidos por falta de seguimiento.</p>
					<a class="hp-link" href="<?php echo esc_url( $hp_contacto ); ?>">Conectar tu embudo comercial <?php echo howpath_icon( 'arrow-right' ); ?></a>
				</div>
			</div>
		</div>
	</section>

	<!-- LO QUE NOS DISTINGUE -->
	<section class="hp-section hp-section--ink" id="diferenciadores">
		<div class="hp-wrap hp-values">
			<div class="hp-values__copy">
				<header class="hp-head">
					<p class="hp-pill">Lo que nos distingue</p>
					<h2 class="hp-head__title">Estrategia, tecnología y ejecución en un mismo equipo</h2>
					<p class="hp-head__text">No medimos el éxito por alcance o seguidores, sino por oportunidades, cierres y rentabilidad. Somos tu socio para construir crecimiento sostenible.</p>
				</header>

				<ul class="hp-features">
					<li>
						<span class="hp-features__icon"><?php echo howpath_icon( 'sliders' ); ?></span>
						<span><strong>Enfoque a la medida</strong>Adaptamos la estrategia a la madurez digital de tu empresa y a la capacidad de tu equipo comercial.</span>
					</li>
					<li>
						<span class="hp-features__icon"><?php echo howpath_icon( 'cpu' ); ?></span>
						<span><strong>Tecnología que se conecta</strong>Integramos CRM, automatización y medición para simplificar tu operación, no para complicarla.</span>
					</li>
					<li>
						<span class="hp-features__icon"><?php echo howpath_icon( 'refresh' ); ?></span>
						<span><strong>Mejora continua</strong>Medimos, analizamos y ajustamos cada mes lo que construimos.</span>
					</li>
				</ul>
			</div>

			<div class="hp-matrix">
				<div class="hp-matrix__bar">
					<span><i class="hp-matrix__dot" aria-hidden="true"></i> Indicadores que conectamos</span>
					<span class="hp-matrix__chip">Marketing + ventas</span>
				</div>
				<div class="hp-matrix__grid">
					<div class="hp-kpi">
						<span class="hp-kpi__label">Costo por prospecto</span>
						<span class="hp-kpi__value">CPL</span>
						<p>Cuánto cuesta cada contacto y de qué canal viene.</p>
					</div>
					<div class="hp-kpi">
						<span class="hp-kpi__label">Costo de adquisición</span>
						<span class="hp-kpi__value is-accent">CAC</span>
						<p>Cuánto inviertes realmente para ganar un cliente.</p>
					</div>
					<div class="hp-kpi">
						<span class="hp-kpi__label">Calidad del prospecto</span>
						<span class="hp-kpi__value">SQL</span>
						<p>Qué contactos están listos para una conversación de venta.</p>
					</div>
					<div class="hp-kpi">
						<span class="hp-kpi__label">Retorno publicitario</span>
						<span class="hp-kpi__value">ROAS</span>
						<p>Cuánto ingreso genera cada peso invertido en pauta.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- CÓMO TRABAJAMOS -->
	<section class="hp-section hp-section--card" id="como-trabajamos">
		<div class="hp-wrap">
			<header class="hp-head hp-head--center">
				<p class="hp-pill">Cómo trabajamos</p>
				<h2 class="hp-head__title">Pensamos, construimos y ejecutamos</h2>
				<p class="hp-head__text">Cada proyecto avanza por cuatro etapas conectadas. El punto de partida depende de la situación y la madurez digital de tu empresa.</p>
			</header>

			<ol class="hp-process">
				<li class="hp-process__item">
					<span class="hp-process__num">01</span>
					<h3>Diagnóstico y estrategia</h3>
					<p>Entendemos tu negocio, identificamos dónde se pierde crecimiento y definimos objetivos e indicadores.</p>
					<span class="hp-process__unit">Strategy</span>
				</li>
				<li class="hp-process__item">
					<span class="hp-process__num">02</span>
					<h3>Infraestructura</h3>
					<p>Conectamos las herramientas, los datos y los procesos que sostienen el crecimiento.</p>
					<span class="hp-process__unit">Stack</span>
				</li>
				<li class="hp-process__item">
					<span class="hp-process__num">03</span>
					<h3>Ejecución</h3>
					<p>Lanzamos campañas y piezas creativas alineadas con tu proceso comercial.</p>
					<span class="hp-process__unit">Growth + Studio</span>
				</li>
				<li class="hp-process__item">
					<span class="hp-process__num">04</span>
					<h3>Medición y mejora</h3>
					<p>Medimos el impacto comercial y lo usamos para ajustar la estrategia, la tecnología y las campañas.</p>
					<span class="hp-process__unit">Intelligence</span>
				</li>
			</ol>
		</div>
	</section>

	<!-- LLAMADO FINAL -->
	<section class="hp-cta" id="contacto">
		<div class="hp-cta__glow hp-cta__glow--orange" aria-hidden="true"></div>
		<div class="hp-cta__glow hp-cta__glow--slate" aria-hidden="true"></div>
		<div class="hp-wrap hp-cta__inner">
			<p class="hp-pill">Encontramos el cómo. Construimos el camino.</p>
			<h2 class="hp-cta__title">
				Conversemos sobre tu<br>
				<span class="hp-gradient-text">próximo proyecto digital</span>
			</h2>
			<p class="hp-cta__text">Ayudamos a empresas medianas y grandes en México a convertir su marketing digital en un sistema de crecimiento medible.</p>
			<div class="hp-actions hp-actions--center">
				<a class="hp-btn hp-btn--primary hp-btn--lg" href="<?php echo esc_url( $hp_contacto ); ?>">
					Contáctanos <?php echo howpath_icon( 'arrow-right' ); ?>
				</a>
				<a class="hp-btn hp-btn--ghost hp-btn--lg" href="#servicios">Ver servicios</a>
			</div>
		</div>
	</section>

</div>
