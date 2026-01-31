<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <script>
        window.csrfToken = "{{ csrf_token() }}";
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fuego Vivo | Red Global de Liderazgo</title>

    <!-- React & ReactDOM -->
    <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>

    <!-- Babel for JSX -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        .gradient-text {
            background: linear-gradient(90deg, #1a1a1a 0%, #ea580c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-white text-slate-900 antialiased selection:bg-orange-500 selection:text-white">

    <div id="root"></div>

    <script type="text/babel">
        const { useState, useEffect } = React;


        const delayStyle1 = { animationDelay: '0.1s' };
        const delayStyle2 = { animationDelay: '0.3s' };

        const Icon = ({ children, size = 24, className = "" }) => (
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width={size}
                height={size}
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                strokeWidth="2"
                strokeLinecap="round"
                strokeLinejoin="round"
                className={className}
            >
                {children}
            </svg>
        );

        const ArrowRight = (props) => <Icon {...props}><path d="M5 12h14" /><path d="m12 5 7 7-7 7" /></Icon>;
        const Globe = (props) => <Icon {...props}><circle cx="12" cy="12" r="10" /><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" /><path d="M2 12h20" /></Icon>;
        const TrendingUp = (props) => <Icon {...props}><polyline points="22 7 13.5 15.5 8.5 10.5 2 17" /><polyline points="16 7 22 7 22 13" /></Icon>;
        const Users = (props) => <Icon {...props}><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M22 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></Icon>;
        const ShieldCheck = (props) => <Icon {...props}><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" /><path d="m9 12 2 2 4-4" /></Icon>;
        const Play = (props) => <Icon {...props}><polygon points="5 3 19 12 5 21 5 3" /></Icon>;
        const Menu = (props) => <Icon {...props}><line x1="4" x2="20" y1="12" y2="12" /><line x1="4" x2="20" y1="6" y2="6" /><line x1="4" x2="20" y1="18" y2="18" /></Icon>;
        const X = (props) => <Icon {...props}><path d="M18 6 6 18" /><path d="m6 6 18 12" /></Icon>;
        const ChevronRight = (props) => <Icon {...props}><path d="m9 18 6-6-6-6" /></Icon>;

        const Navbar = () => {
            const [isOpen, setIsOpen] = useState(false);
            const [scrolled, setScrolled] = useState(false);

            useEffect(() => {
                const handleScroll = () => setScrolled(window.scrollY > 50);
                window.addEventListener('scroll', handleScroll);
                return () => window.removeEventListener('scroll', handleScroll);
            }, []);

            return (
                <nav className={`fixed w-full z-50 transition-all duration-300 ${scrolled ? 'bg-white/95 backdrop-blur-sm shadow-sm py-4' : 'bg-transparent py-6'}`}>
                    <div className="max-w-7xl mx-auto px-6 flex justify-between items-center">
                        <div className="flex items-center gap-2">
                            <div className="w-8 h-8 bg-orange-600 rounded-sm flex items-center justify-center">
                                <span className="text-white font-bold text-xl">F</span>
                            </div>
                            <span className="text-xl font-bold tracking-tighter uppercase">Fuego Vivo<span className="text-orange-600">.</span></span>
                        </div>

                        <div className="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                            <a href="#vision" className="hover:text-black transition-colors">VISIÓN</a>
                            <a href="#sistema" className="hover:text-black transition-colors">EL SISTEMA</a>
                            <a href="#expansion" className="hover:text-black transition-colors">EXPANSIÓN</a>
                            <a href="/admin/login" className="px-5 py-2.5 bg-slate-900 text-white hover:bg-orange-600 transition-all duration-300 rounded-sm">
                                ACCESO SOCIOS
                            </a>
                        </div>

                        <button className="md:hidden" onClick={() => setIsOpen(!isOpen)}>
                            {isOpen ? <X /> : <Menu />}
                        </button>
                    </div>

                    {isOpen && (
                        <div className="absolute top-full left-0 w-full bg-white shadow-xl py-8 px-6 flex flex-col gap-4 md:hidden border-t">
                            <a href="#vision" className="text-lg font-bold" onClick={() => setIsOpen(false)}>Visión</a>
                            <a href="#sistema" className="text-lg font-bold" onClick={() => setIsOpen(false)}>El Sistema</a>
                            <a href="#expansion" className="text-lg font-bold" onClick={() => setIsOpen(false)}>Expansión</a>
                            <button className="w-full py-3 bg-black text-white font-bold mt-4">ACCESO SOCIOS</button>
                        </div>
                    )}
                </nav>
            );
        };

        const Hero = () => {
            return (
                <section className="relative min-h-screen flex items-center pt-20 overflow-hidden">
                    <div className="absolute inset-0 z-0 opacity-5">
                        <div className="absolute top-0 right-0 w-2/3 h-full bg-slate-900 transform skew-x-12 translate-x-20"></div>
                    </div>

                    <div className="max-w-7xl mx-auto px-6 relative z-10 grid md:grid-cols-2 gap-12 items-center">
                        <div className="fade-in-up" style={delayStyle1}>
                            <div className="inline-flex items-center gap-2 px-3 py-1 bg-orange-50 border border-orange-100 rounded-full mb-6">
                                <span className="w-2 h-2 rounded-full bg-orange-600 animate-pulse"></span>
                                <span className="text-xs font-bold text-orange-700 tracking-wide uppercase">Red Global Activa</span>
                            </div>
                            <h1 className="text-5xl md:text-7xl font-extrabold tracking-tight leading-tight mb-6">
                                Fe. Influencia. <br />
                                <span className="gradient-text">Resultados.</span>
                            </h1>
                            <p className="text-lg text-slate-500 mb-8 max-w-lg leading-relaxed">
                                Fuego Vivo no es solo una congregación. Es una plataforma de liderazgo espiritual diseñada para potenciar tu propósito y expandir tu impacto en el mundo real.
                            </p>
                            <div className="flex flex-col sm:flex-row gap-4">
                                <a href="/admin/login" className="px-8 py-4 bg-slate-900 text-white font-bold rounded-sm hover:bg-orange-600 transition-all flex items-center justify-center gap-2 group shadow-lg shadow-orange-900/10">
                                    Únete a la Red <ArrowRight size={18} className="group-hover:translate-x-1 transition-transform" />
                                </a>
                                <button className="px-8 py-4 border border-slate-200 text-slate-700 font-bold rounded-sm hover:border-black transition-all flex items-center justify-center gap-2">
                                    <Play size={18} /> Ver Presentación
                                </button>
                            </div>

                            <div className="mt-12 flex items-center gap-8 border-t border-slate-100 pt-8">
                                <div>
                                    <p className="text-3xl font-bold text-slate-900">12k+</p>
                                    <p className="text-xs text-slate-500 uppercase tracking-wider">Socios Activos</p>
                                </div>
                                <div>
                                    <p className="text-3xl font-bold text-slate-900">45</p>
                                    <p className="text-xs text-slate-500 uppercase tracking-wider">Ciudades</p>
                                </div>
                                <div>
                                    <p className="text-3xl font-bold text-slate-900">1</p>
                                    <p className="text-xs text-slate-500 uppercase tracking-wider">Visión</p>
                                </div>
                            </div>
                        </div>

                        <div className="relative hidden md:block fade-in-up" style={delayStyle2}>
                            <div className="relative w-full aspect-square bg-slate-100 rounded-sm overflow-hidden shadow-2xl">
                                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1632&q=80" alt="Corporate Worship" className="w-full h-full object-cover filter grayscale hover:grayscale-0 transition-all duration-700" />
                                <div className="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-black/80 to-transparent">
                                    <p className="text-white font-medium italic">"La iglesia dejó de ser un edificio para convertirse en un movimiento."</p>
                                </div>
                            </div>
                            <div className="absolute -bottom-6 -left-6 bg-white p-6 shadow-xl border-l-4 border-orange-600 rounded-sm">
                                <div className="flex items-center gap-4">
                                    <div className="bg-green-100 p-3 rounded-full text-green-700">
                                        <TrendingUp size={24} />
                                    </div>
                                    <div>
                                        <p className="text-sm text-slate-500">Crecimiento Q1</p>
                                        <p className="text-xl font-bold text-slate-900">+240% Impacto</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            );
        };

        const ValueProps = () => {
            const features = [
                {
                    icon: <Globe size={32} />,
                    title: "Networking Espiritual",
                    desc: "Conecta con líderes de industria que comparten tus principios. Tu fe y tu carrera no son caminos separados."
                },
                {
                    icon: <ShieldCheck size={32} />,
                    title: "Cobertura Integral",
                    desc: "Un sistema de mentoría multinivel diseñado para proteger tu familia, tus finanzas y tu integridad."
                },
                {
                    icon: <Users size={32} />,
                    title: "Liderazgo Escalable",
                    desc: "Nuestro modelo de discipulado corporativo te permite crecer desde miembro hasta director de expansión."
                }
            ];

            return (
                <section id="vision" className="py-24 bg-slate-50">
                    <div className="max-w-7xl mx-auto px-6">
                        <div className="text-center max-w-3xl mx-auto mb-16">
                            <h2 className="text-sm font-bold text-orange-600 tracking-widest uppercase mb-3">Nuestra Propuesta</h2>
                            <h3 className="text-3xl md:text-4xl font-bold text-slate-900 mb-6">Reingeniería Eclesiástica</h3>
                            <p className="text-slate-600">Hemos eliminado la religiosidad para enfocarnos en la relevancia. Fuego Vivo opera con la eficiencia de una corporación y el corazón de un ministerio.</p>
                        </div>

                        <div className="grid md:grid-cols-3 gap-8">
                            {features.map((f, i) => (
                                <div key={i} className="bg-white p-8 shadow-sm hover:shadow-xl transition-shadow duration-300 border-t-2 border-transparent hover:border-orange-600 group">
                                    <div className="w-16 h-16 bg-slate-100 rounded-sm flex items-center justify-center text-slate-900 mb-6 group-hover:bg-orange-600 group-hover:text-white transition-colors">
                                        {f.icon}
                                    </div>
                                    <h4 className="text-xl font-bold mb-4">{f.title}</h4>
                                    <p className="text-slate-500 leading-relaxed">{f.desc}</p>
                                </div>
                            ))}
                        </div>
                    </div>
                </section>
            );
        };

        const TheSystem = () => {
            const steps = [
                { num: "01", title: "Conexión", desc: "Ingreso a una célula corporativa de alto valor." },
                { num: "02", title: "Capacitación", desc: "Mastermind de fundamentos y liderazgo espiritual." },
                { num: "03", title: "Activación", desc: "Lanzamiento de tu propio nodo de influencia." },
                { num: "04", title: "Expansión", desc: "Mentorea a otros y multiplica tu impacto." },
            ];

            return (
                <section id="sistema" className="py-24 bg-slate-900 text-white">
                    <div className="max-w-7xl mx-auto px-6">
                        <div className="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                            <div>
                                <h2 className="text-3xl md:text-5xl font-bold mb-4">El Sistema FV™</h2>
                                <p className="text-slate-400 max-w-xl">Una metodología probada para transformar creyentes pasivos en líderes activos. Sin improvisación.</p>
                            </div>
                            <button className="px-6 py-3 border border-orange-600 text-orange-500 hover:bg-orange-600 hover:text-white transition-colors uppercase text-sm font-bold tracking-wider">
                                Descargar Whitepaper
                            </button>
                        </div>

                        <div className="grid md:grid-cols-4 gap-0">
                            {steps.map((step, i) => (
                                <div key={i} className="relative p-8 border-l border-slate-700 hover:bg-slate-800 transition-colors group cursor-pointer">
                                    <div className="text-6xl font-black text-slate-800 group-hover:text-orange-600/20 transition-colors mb-4 absolute top-4 right-4">{step.num}</div>
                                    <div className="relative z-10">
                                        <h3 className="text-2xl font-bold mb-2 group-hover:text-orange-500 transition-colors">{step.title}</h3>
                                        <p className="text-slate-400 text-sm">{step.desc}</p>
                                    </div>
                                    <div className="mt-8 flex items-center text-xs font-bold uppercase tracking-widest text-slate-600 group-hover:text-white">
                                        Siguiente nivel <ChevronRight size={14} />
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </section>
            );
        };

        const CTA = () => {
            return (
                <section id="expansion" className="py-24 bg-white relative overflow-hidden">
                    <div className="max-w-4xl mx-auto px-6 text-center relative z-10">
                        <h2 className="text-4xl md:text-5xl font-bold text-slate-900 mb-8">¿Listo para encender tu potencial?</h2>
                        <p className="text-xl text-slate-600 mb-10">
                            Únete hoy a la red de crecimiento espiritual más relevante de la región.
                            No busques una silla vacía, busca tu posición en el sistema.
                        </p>

                        <form action="/register-landing" method="POST" className="bg-white shadow-2xl p-8 rounded-sm text-left max-w-lg mx-auto border border-slate-100">
                            <input type="hidden" name="_token" value={window.csrfToken} />

                            <div className="mb-4">
                                <label className="block text-xs font-bold text-slate-900 uppercase mb-2">Nombre Completo</label>
                                <input type="text" name="name" required className="w-full bg-slate-50 border border-slate-200 p-3 focus:outline-none focus:border-orange-500 transition-colors" placeholder="Ej. Juan Pérez" />
                            </div>
                            <div className="mb-4">
                                <label className="block text-xs font-bold text-slate-900 uppercase mb-2">Correo Corporativo / Personal</label>
                                <input type="email" name="email" required className="w-full bg-slate-50 border border-slate-200 p-3 focus:outline-none focus:border-orange-500 transition-colors" placeholder="nombre@empresa.com" />
                            </div>
                            <div className="mb-4">
                                <label className="block text-xs font-bold text-slate-900 uppercase mb-2">Contraseña</label>
                                <input type="password" name="password" required className="w-full bg-slate-50 border border-slate-200 p-3 focus:outline-none focus:border-orange-500 transition-colors" placeholder="********" />
                            </div>
                            <div className="mb-6">
                                <label className="block text-xs font-bold text-slate-900 uppercase mb-2">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" required className="w-full bg-slate-50 border border-slate-200 p-3 focus:outline-none focus:border-orange-500 transition-colors" placeholder="********" />
                            </div>
                            <button type="submit" className="w-full py-4 bg-orange-600 text-white font-bold text-lg hover:bg-orange-700 transition-colors shadow-lg shadow-orange-600/30">
                                SOLICITAR MEMBRESÍA
                            </button>
                            <p className="text-center text-xs text-slate-400 mt-4">Al aplicar, aceptas nuestros términos de cultura y honor.</p>
                        </form>
                    </div>

                    {/* Background Pattern */}
                    <div className="absolute top-1/2 left-0 w-full h-64 bg-slate-50 -skew-y-3 z-0 transform -translate-y-1/2"></div>
                </section>
            );
        };

        const Footer = () => {
            return (
                <footer className="bg-black text-white py-16 border-t border-slate-800">
                    <div className="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12 text-sm">
                        <div className="col-span-1 md:col-span-2">
                            <div className="flex items-center gap-2 mb-6">
                                <div className="w-6 h-6 bg-orange-600 rounded-sm flex items-center justify-center">
                                    <span className="text-white font-bold text-sm">F</span>
                                </div>
                                <span className="text-lg font-bold tracking-tighter uppercase">Fuego Vivo<span className="text-orange-600">.</span></span>
                            </div>
                            <p className="text-slate-400 max-w-sm">
                                Una corporación espiritual dedicada a establecer el reino a través de principios de excelencia, liderazgo y conexión estratégica.
                            </p>
                        </div>

                        <div>
                            <h4 className="font-bold text-white mb-6 uppercase tracking-wider">La Red</h4>
                            <ul className="space-y-4 text-slate-400">
                                <li><a href="#" className="hover:text-orange-500 transition-colors">Sobre Nosotros</a></li>
                                <li><a href="#" className="hover:text-orange-500 transition-colors">Liderazgo</a></li>
                                <li><a href="#" className="hover:text-orange-500 transition-colors">Sedes Globales</a></li>
                                <li><a href="#" className="hover:text-orange-500 transition-colors">Inversionistas del Reino</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4 className="font-bold text-white mb-6 uppercase tracking-wider">Legal & Contacto</h4>
                            <ul className="space-y-4 text-slate-400">
                                <li><a href="#" className="hover:text-orange-500 transition-colors">Política de Privacidad</a></li>
                                <li><a href="#" className="hover:text-orange-500 transition-colors">Términos de Uso</a></li>
                                <li><a href="#" className="hover:text-orange-500 transition-colors">Soporte</a></li>
                                <li className="text-orange-500">contacto@fuegovivo.corp</li>
                            </ul>
                        </div>
                    </div>
                    <div className="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-slate-800 text-center text-slate-600 text-xs">
                        &copy; 2024 Fuego Vivo Global Network. Todos los derechos reservados.
                    </div>
                </footer>
            );
        };

        const App = () => {
            return (
                <div>
                    <Navbar />
                    <Hero />
                    <ValueProps />
                    <TheSystem />
                    <CTA />
                    <Footer />
                </div>
            );
        };

        const root = ReactDOM.createRoot(document.getElementById('root'));
        root.render(<App />);
    </script>
</body>

</html>