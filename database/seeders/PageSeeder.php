<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'about',
                'title_ru' => 'О компании',
                'title_en' => 'About Us',
                'content_ru' => <<<HTML
                <h2>Добро пожаловать в «Audi Drive»</h2>
                <p>Ваш официальный дилер Audi в Москве.</p>
                <p>Автосалон «Audi Drive» был основан в 2015 году с целью предоставить клиентам премиальный сервис по продаже и обслуживанию автомобилей марки Audi. За годы работы мы зарекомендовали себя как надёжный и ответственный партнёр, который ценит каждого клиента и стремится сделать процесс покупки автомобиля максимально комфортным и прозрачным.</p>
                <h3>Наши ценности</h3>
                <ul>
                    <li><strong>Честность</strong> — мы всегда предоставляем полную информацию об автомобилях, комплектациях и ценах.</li>
                    <li><strong>Клиентоориентированность</strong> — для нас важен каждый клиент. Мы индивидуально подходим к каждому запросу и помогаем выбрать идеальный автомобиль.</li>
                    <li><strong>Профессионализм</strong> — наши менеджеры и технические специалисты регулярно проходят обучение и сертификацию у официальных представителей Audi.</li>
                    <li><strong>Прозрачность</strong> — никаких скрытых платежей и навязывания дополнительных услуг.</li>
                </ul>
                <h3>Что мы предлагаем</h3>
                <ul>
                    <li>Полный модельный ряд новых автомобилей Audi (седаны, купе, кроссоверы, спортивные модели, электромобили).</li>
                    <li>Профессиональные консультации по выбору автомобиля и комплектации.</li>
                    <li>Возможность тест-драйва любой заинтересовавшей вас модели.</li>
                    <li>Оформление заявки на покупку автомобиля.</li>
                    <li>Сервисное обслуживание и гарантийный ремонт.</li>
                    <li>Помощь в оформлении кредита и страхования.</li>
                </ul>
                <h3>Наша команда</h3>
                <p>Это профессионалы, которые искренне любят своё дело. Мы знаем об Audi всё и готовы делиться этими знаниями с вами. Мы гордимся тем, что каждый год сотни клиентов выбирают «Audi Drive» и возвращаются к нам снова.</p>
                <h3>Приезжайте знакомиться!</h3>
                <p>Мы находимся по адресу: <strong>г. Москва, ул. Автозаводская, д. 15</strong></p>
                <p>Мы работаем для вас ежедневно с <strong>10:00 до 21:00</strong>.</p>
                <p><em>«Audi Drive» — там, где технологии встречаются с эмоциями.</em></p>
                HTML,
                                'content_en' => <<<HTML
                <h2>Welcome to «Audi Drive»</h2>
                <p>Your official Audi dealer in Moscow.</p>
                <p>The «Audi Drive» dealership was founded in 2015 with the aim of providing premium sales and maintenance services for Audi vehicles. Over the years, we have established ourselves as a reliable and responsible partner who values every customer and strives to make the car purchasing process as comfortable and transparent as possible.</p>
                <h3>Our values</h3>
                <ul>
                    <li><strong>Honesty</strong> — we always provide complete and accurate information about cars, specifications and prices.</li>
                    <li><strong>Customer focus</strong> — every customer matters to us. We take an individual approach to every request and help choose the perfect car.</li>
                    <li><strong>Professionalism</strong> — our managers and technicians regularly undergo training and certification from official Audi representatives.</li>
                    <li><strong>Transparency</strong> — no hidden fees or additional services imposed. Only what you choose.</li>
                </ul>
                <h3>What we offer</h3>
                <ul>
                    <li>Full range of new Audi vehicles (sedans, coupes, crossovers, sports models, electric vehicles).</li>
                    <li>Professional consultations on car selection and configuration.</li>
                    <li>Test drive of any model you are interested in.</li>
                    <li>Car purchase request processing.</li>
                    <li>Maintenance and warranty repairs.</li>
                    <li>Assistance with loan and insurance processing.</li>
                </ul>
                <h3>Our team</h3>
                <p>These are professionals who genuinely love their work. We know everything about Audi and are ready to share this knowledge with you. We are proud that every year hundreds of customers choose «Audi Drive» and return to us again.</p>
                <h3>Come and meet us!</h3>
                <p>We are located at: <strong>Moscow, Avtozavodskaya str., 15</strong></p>
                <p>We work for you daily from <strong>10:00 to 21:00</strong>.</p>
                <p><em>«Audi Drive» — where technology meets emotion.</em></p>
                HTML,
                            ],
                            [
                                'slug' => 'brand-history',
                                'title_ru' => 'История марки Audi',
                                'title_en' => 'Audi Brand History',
                                'content_ru' => <<<HTML
                <h2>Audi — символ инноваций</h2>
                <p>История бренда насчитывает более 110 лет.</p>
                <h3>Основание компании</h3>
                <p>История Audi начинается в 1909 году, когда Август Хорьх основал компанию «Horch Automobil-Werke GmbH». Однако из-за разногласий с партнёрами он покинул собственное предприятие и основал новую компанию. Так родилось имя одного из самых известных автомобильных брендов в мире.</p>
                <h3>Четыре кольца — история объединения</h3>
                <p>Легендарный логотип Audi — четыре кольца — символизирует слияние четырёх независимых автомобильных компаний в 1932 году:</p>
                <ul>
                    <li>Audi</li>
                    <li>DKW (Dampf-Kraft-Wagen)</li>
                    <li>Horch</li>
                    <li>Wanderer</li>
                </ul>
                <p>Объединённая компания получила название Auto Union AG и стала вторым по величине производителем автомобилей в Германии на тот момент.</p>
                <h3>Технологические инновации</h3>
                <ul>
                    <li><strong>1980 год</strong> — дебют системы полного привода quattro. Революция в мире автомобилестроения.</li>
                    <li><strong>1990-е</strong> — разработка технологий лёгких кузовов Audi Space Frame (ASF).</li>
                    <li><strong>2000-е</strong> — внедрение системы TFSI.</li>
                    <li><strong>2010-е</strong> — развитие электромобилей и гибридных технологий. Дебют серии e-tron.</li>
                    <li><strong>2020-е</strong> — переход к полностью электрическому будущему. Планы стать углеродно-нейтральным брендом.</li>
                </ul>
                <h3>Audi сегодня</h3>
                <p>Сегодня Audi — один из ведущих премиальных автомобильных брендов в мире. Штаб-квартира находится в городе Ингольштадт (Германия). Audi — это сочетание передовых технологий, превосходного дизайна и непревзойдённого комфорта.</p>
                <p><strong>«Vorsprung durch Technik»</strong> — этот девиз как нельзя лучше описывает философию бренда Audi.</p>
                HTML,
                                'content_en' => <<<HTML
                <h2>Audi — a symbol of innovation</h2>
                <p>The brand's history spans over 110 years.</p>
                <h3>Foundation of the company</h3>
                <p>The history of Audi begins in 1909 when August Horch founded Horch Automobil-Werke GmbH. Due to disagreements with partners, he left his own company and founded a new one. This is how the name of one of the world's most famous automotive brands was born.</p>
                <h3>Four rings — the story of unification</h3>
                <p>The legendary Audi logo — four rings — symbolizes the merger of four independent automobile companies in 1932:</p>
                <ul>
                    <li>Audi</li>
                    <li>DKW (Dampf-Kraft-Wagen)</li>
                    <li>Horch</li>
                    <li>Wanderer</li>
                </ul>
                <p>The united company was named Auto Union AG and became the second largest automobile manufacturer in Germany at the time.</p>
                <h3>Technological innovations</h3>
                <ul>
                    <li><strong>1980</strong> — debut of the quattro all-wheel drive system. A revolution in the automotive industry.</li>
                    <li><strong>1990s</strong> — development of Audi Space Frame (ASF) lightweight body technologies.</li>
                    <li><strong>2000s</strong> — introduction of the TFSI system.</li>
                    <li><strong>2010s</strong> — development of electric vehicles and hybrid technologies. Debut of the e-tron series.</li>
                    <li><strong>2020s</strong> — transition to a fully electric future. Plans to become a carbon-neutral brand.</li>
                </ul>
                <h3>Audi today</h3>
                <p>Today Audi is one of the world's leading premium automotive brands. The headquarters is located in Ingolstadt, Germany. Audi is a combination of advanced technologies, superior design and unparalleled comfort.</p>
                <p><strong>«Vorsprung durch Technik»</strong> — this motto perfectly describes the philosophy of the Audi brand.</p>
                HTML,
                            ],
                            [
                                'slug' => 'contacts',
                                'title_ru' => 'Контакты',
                                'title_en' => 'Contacts',
                                'content_ru' => <<<HTML
                <h2>Контактная информация</h2>
                <table class="contacts-table">
                    <tr><th>Способ связи</th><th>Данные</th></tr>
                    <tr><td>Телефон отдела продаж</td><td>+7 (495) 123-45-67</td></tr>
                    <tr><td>Телефон сервисного центра</td><td>+7 (495) 123-45-68</td></tr>
                    <tr><td>Электронная почта</td><td>info@audi-drive.ru</td></tr>
                    <tr><td>Адрес</td><td>г. Москва, ул. Автозаводская, д. 15</td></tr>
                    <tr><td>Часы работы шоурума</td><td>Пн–Вс: 10:00 – 21:00</td></tr>
                    <tr><td>Часы работы сервиса</td><td>Пн–Сб: 09:00 – 20:00, Вс: выходной</td></tr>
                </table>

                <h3>Схема проезда</h3>
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8982.598859626065!2d37.52886708615852!3d55.74721496931255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54bdd017303b9%3A0xd1f63f945a2450c2!2z0JzQvtGB0LrQstCwINCh0LjRgtC4!5e0!3m2!1sru!2sfi!4v1781628818393!5m2!1sru!2sfi"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <h4>На общественном транспорте:</h4>
                <p>Станция метро «Автозаводская» (выход к ул. Автозаводская). От метро пешком примерно 5–7 минут.</p>
                <p>Автобусы № 123, 456 до остановки «Автозаводская улица, дом 15».</p>
                <h4>На автомобиле:</h4>
                <p>С Третьего транспортного кольца съезд на ул. Автозаводскую. Автосалон расположен на правой стороне, рядом с торговым центром «Москва».</p>
                <p><strong>Парковка:</strong> Бесплатная охраняемая парковка для клиентов автосалона.</p>

                <h3>Мы в социальных сетях</h3>
                <ul class="social-links">
                    <li><a href="https://t.me/audi_drive" target="_blank">Telegram</a></li>
                    <li><a href="https://instagram.com/audi_drive" target="_blank">Instagram</a></li>
                    <li><a href="https://youtube.com/c/audidrive" target="_blank">YouTube</a></li>
                </ul>

                <h3>Часто задаваемые вопросы</h3>
                <div class="faq-item">
                    <h4>Нужно ли записываться на тест-драйв заранее?</h4>
                    <p>Да, мы рекомендуем записываться минимум за день до планируемого визита, чтобы мы могли подготовить автомобиль и согласовать удобное для вас время.</p>
                </div>
                <div class="faq-item">
                    <h4>Можно ли приехать на тест-драйв без записи?</h4>
                    <p>Возможно, но в часы пик (выходные и вечер будних дней) свободных автомобилей может не оказаться. Лучше записаться заранее через форму на сайте.</p>
                </div>
                <div class="faq-item">
                    <h4>Какие документы нужны для тест-драйва?</h4>
                    <p>Водительское удостоверение и паспорт (для оформления договора). Водительский стаж — от 2 лет.</p>
                </div>
                <div class="faq-item">
                    <h4>Есть ли кредит или рассрочка?</h4>
                    <p>Да, мы сотрудничаем с несколькими банками. Условия можно уточнить у менеджеров отдела продаж по телефону +7 (495) 123-45-67.</p>
                </div>
                <div class="faq-item">
                    <h4>Можно ли забрать автомобиль в день покупки?</h4>
                    <p>При наличии автомобиля в наличии и полной оплате — да. В некоторых случаях (оформление кредита, страховки, регистрация) процесс может занять 1–3 дня.</p>
                </div>
                HTML,
                                'content_en' => <<<HTML
                <h2>Contact Information</h2>
                <table class="contacts-table">
                    <tr><th>Contact Method</th><th>Details</th></tr>
                    <tr><td>Sales Department Phone</td><td>+7 (495) 123-45-67</td></tr>
                    <tr><td>Service Center Phone</td><td>+7 (495) 123-45-68</td></tr>
                    <tr><td>Email</td><td>info@audi-drive.ru</td></tr>
                    <tr><td>Address</td><td>Moscow, Avtozavodskaya str., 15</td></tr>
                    <tr><td>Showroom Hours</td><td>Mon–Sun: 10:00 – 21:00</td></tr>
                    <tr><td>Service Hours</td><td>Mon–Sat: 09:00 – 20:00, Sun: closed</td></tr>
                </table>

                <h3>How to get there</h3>
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8982.598859626065!2d37.52886708615852!3d55.74721496931255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54bdd017303b9%3A0xd1f63f945a2450c2!2z0JzQvtGB0LrQstCwINCh0LjRgtC4!5e0!3m2!1sru!2sfi!4v1781628818393!5m2!1sru!2sfi"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <h4>By public transport:</h4>
                <p>Avtozavodskaya metro station (exit to Avtozavodskaya str.). About 5–7 minutes walk from the metro.</p>
                <p>Buses No. 123, 456 to the stop "Avtozavodskaya str., 15".</p>
                <h4>By car:</h4>
                <p>From the Third Transport Ring, exit to Avtozavodskaya str. The car dealership is located on the right side, next to the "Moscow" shopping center.</p>
                <p><strong>Parking:</strong> Free guarded parking for car dealership customers.</p>

                <h3>We are on social networks</h3>
                <ul class="social-links">
                    <li><a href="https://t.me/audi_drive" target="_blank">Telegram</a></li>
                    <li><a href="https://instagram.com/audi_drive" target="_blank">Instagram</a></li>
                    <li><a href="https://youtube.com/c/audidrive" target="_blank">YouTube</a></li>
                </ul>

                <h3>FAQ</h3>
                <div class="faq-item">
                    <h4>Do I need to book a test drive in advance?</h4>
                    <p>Yes, we recommend booking at least a day before your planned visit so we can prepare the car and agree on a convenient time.</p>
                </div>
                <div class="faq-item">
                    <h4>Can I come for a test drive without booking?</h4>
                    <p>Possible, but during peak hours (weekends and weekday evenings) there may be no available cars. Better to book in advance through the form on the website.</p>
                </div>
                <div class="faq-item">
                    <h4>What documents are needed for a test drive?</h4>
                    <p>Driver's license and passport (for contract registration). Minimum driving experience is 2 years.</p>
                </div>
                <div class="faq-item">
                    <h4>Is there a loan or installment plan?</h4>
                    <p>Yes, we cooperate with several banks. Conditions can be clarified with the sales managers by phone +7 (495) 123-45-67.</p>
                </div>
                <div class="faq-item">
                    <h4>Can I pick up the car on the day of purchase?</h4>
                    <p>If the car is in stock and full payment is made — yes. In some cases (loan registration, insurance, registration) the process can take 1–3 days.</p>
                </div>
                HTML,
                    ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}