@extends('layouts.app',[
    'ads'=>"hide"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 text-center text-muted">
            <h3 class="mt-4 ">Registar Conta</h3>
            <p class="mb-0 ">Junte-se a nós e siga seus autores favoritos de perto, interaja com as histórias mais interessantes, explore os artigos e blogs que se identifica, nos tópicos que adora.</p>
        </div>
        <div class="col-12 text-center mb-4">
            <a href="/login" class=" text-center" style="font-size: 0.8rem;"><u>Já tem conta?</u></a>
        </div>

        <div class="col-sm-5 px-0">


            <form class="px-4" method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" id="image" name="image" value="{{$image??null}}">
                <div class="form-group row">
                    <label for="name"
                        class="col-md-12 col-form-label text-left text-muted pb-0">{{ __('Nome') }}</label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name')?? $name??null }}" required autocomplete="name"
                            maxlength="20" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                        class="col-md-12 col-form-label text-left text-muted pb-0">{{ __('Email') }}</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') ?? $email ?? null}}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                        class="col-6 pr-1 col-form-label text-left text-muted pb-0">{{ __('Senha') }}</label>
                    <label for="password-confirm"
                        class="col-6 pl-1 col-form-label text-left text-muted pb-0">{{ __('Confirmar senha') }}</label>
                    <div class="col-6 pr-1">
                        <input id="password" type="password" minlength="6"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6 pl-1">
                        <input id="password-confirm" minlength="6" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>


                <div class="my-4 text-center">
                    <a class="btn btn-light border rounded-circle text-danger mx-3 "
                        style="height: 40px;width: 40px;padding: 0.5rem;" href="/redirect/google"><i class="fab fa-google"></i></a>
                    <a class="btn btn-light border rounded-circle text-primary mx-3 "
                        style="height: 40px;width: 40px;padding: 0.5rem;" href="/redirect/facebook"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="form-group row">
                    <div class="col-12 small text-center">
                        <span class="text-muted">Reconheço e
                            aceito os
                            <a href="#" data-toggle="modal" data-target="#service-terms">Termos de
                                Serviço</a> & <a href="#" data-toggle="modal" data-target="#privacy-policy">Política
                                de Privacidade.</a></span>
                    </div>
                </div>


                <div class="form-group row mb-0 mt-4">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Registar <i class="fas fa-caret-right" style="
                            font-size: 12px;
                        "></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="service-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h1>Terms and conditions</h1>

                    <p>These terms and conditions (&quot;Terms&quot;, &quot;Agreement&quot;) are an agreement between
                        Website Operator (&quot;Website Operator&quot;, &quot;us&quot;, &quot;we&quot; or
                        &quot;our&quot;) and you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;). This Agreement
                        sets forth the general terms and conditions of your use of the <a target="_blank" rel="nofollow"
                            href="https://icronica.iconnicws.com">icronica.iconnicws.com</a> website and any of its
                        products or services (collectively, &quot;Website&quot; or &quot;Services&quot;).</p>

                    <h2>Accounts and membership</h2>

                    <p>If you create an account on the Website, you are responsible for maintaining the security of your
                        account and you are fully responsible for all activities that occur under the account and any
                        other actions taken in connection with it. We may, but have no obligation to, monitor and review
                        new accounts before you may sign in and use our Services. Providing false contact information of
                        any kind may result in the termination of your account. You must immediately notify us of any
                        unauthorized uses of your account or any other breaches of security. We will not be liable for
                        any acts or omissions by you, including any damages of any kind incurred as a result of such
                        acts or omissions. We may suspend, disable, or delete your account (or any part thereof) if we
                        determine that you have violated any provision of this Agreement or that your conduct or content
                        would tend to damage our reputation and goodwill. If we delete your account for the foregoing
                        reasons, you may not re-register for our Services. We may block your email address and Internet
                        protocol address to prevent further registration.</p>

                    <h2>User content</h2>

                    <p>We do not own any data, information or material (&quot;Content&quot;) that you submit on the
                        Website in the course of using the Service. You shall have sole responsibility for the accuracy,
                        quality, integrity, legality, reliability, appropriateness, and intellectual property ownership
                        or right to use of all submitted Content. We may, but have no obligation to, monitor and review
                        Content on the Website submitted or created using our Services by you. Unless specifically
                        permitted by you, your use of the Website does not grant us the license to use, reproduce,
                        adapt, modify, publish or distribute the Content created by you or stored in your user account
                        for commercial, marketing or any similar purpose. But you grant us permission to access, copy,
                        distribute, store, transmit, reformat, display and perform the Content of your user account
                        solely as required for the purpose of providing the Services to you. Without limiting any of
                        those representations or warranties, we have the right, though not the obligation, to, in our
                        own sole discretion, refuse or remove any Content that, in our reasonable opinion, violates any
                        of our policies or is in any way harmful or objectionable.</p>

                    <h2>Backups</h2>

                    <p>We perform regular backups of the Website and Content, however, these backups are for our own
                        administrative purposes only and are in no way guaranteed. You are responsible for maintaining
                        your own backups of your data. We do not provide any sort of compensation for lost or incomplete
                        data in the event that backups do not function properly. We will do our best to ensure complete
                        and accurate backups, but assume no responsibility for this duty.</p>

                    <h2>Links to other websites</h2>

                    <p>Although this Website may link to other websites, we are not, directly or indirectly, implying
                        any approval, association, sponsorship, endorsement, or affiliation with any linked website,
                        unless specifically stated herein. Some of the links on the Website may be &quot;affiliate
                        links&quot;. This means if you click on the link and purchase an item, Website Operator will
                        receive an affiliate commission. We are not responsible for examining or evaluating, and we do
                        not warrant the offerings of, any businesses or individuals or the content of their websites. We
                        do not assume any responsibility or liability for the actions, products, services, and content
                        of any other third-parties. You should carefully review the legal statements and other
                        conditions of use of any website which you access through a link from this Website. Your linking
                        to any other off-site websites is at your own risk.</p>

                    <h2>Prohibited uses</h2>

                    <p>In addition to other terms as set forth in the Agreement, you are prohibited from using the
                        Website or its Content: (a) for any unlawful purpose; (b) to solicit others to perform or
                        participate in any unlawful acts; (c) to violate any international, federal, provincial or state
                        regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual
                        property rights or the intellectual property rights of others; (e) to harass, abuse, insult,
                        harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual
                        orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false
                        or misleading information; (g) to upload or transmit viruses or any other type of malicious code
                        that will or may be used in any way that will affect the functionality or operation of the
                        Service or of any related website, other websites, or the Internet; (h) to collect or track the
                        personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape;
                        (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security
                        features of the Service or any related website, other websites, or the Internet. We reserve the
                        right to terminate your use of the Service or any related website for violating any of the
                        prohibited uses.</p>

                    <h2>Limitation of liability</h2>

                    <p>To the fullest extent permitted by applicable law, in no event will Website Operator, its
                        affiliates, officers, directors, employees, agents, suppliers or licensors be liable to any
                        person for (a): any indirect, incidental, special, punitive, cover or consequential damages
                        (including, without limitation, damages for lost profits, revenue, sales, goodwill, use of
                        content, impact on business, business interruption, loss of anticipated savings, loss of
                        business opportunity) however caused, under any theory of liability, including, without
                        limitation, contract, tort, warranty, breach of statutory duty, negligence or otherwise, even if
                        Website Operator has been advised as to the possibility of such damages or could have foreseen
                        such damages. To the maximum extent permitted by applicable law, the aggregate liability of
                        Website Operator and its affiliates, officers, employees, agents, suppliers and licensors,
                        relating to the services will be limited to an amount greater of one dollar or any amounts
                        actually paid in cash by you to Website Operator for the prior one month period prior to the
                        first event or occurrence giving rise to such liability. The limitations and exclusions also
                        apply if this remedy does not fully compensate you for any losses or fails of its essential
                        purpose.</p>

                    <h2>Indemnification</h2>

                    <p>You agree to indemnify and hold Website Operator and its affiliates, directors, officers,
                        employees, and agents harmless from and against any liabilities, losses, damages or costs,
                        including reasonable attorneys' fees, incurred in connection with or arising from any
                        third-party allegations, claims, actions, disputes, or demands asserted against any of them as a
                        result of or relating to your Content, your use of the Website or Services or any willful
                        misconduct on your part.</p>

                    <h2>Severability</h2>

                    <p>All rights and restrictions contained in this Agreement may be exercised and shall be applicable
                        and binding only to the extent that they do not violate any applicable laws and are intended to
                        be limited to the extent necessary so that they will not render this Agreement illegal, invalid
                        or unenforceable. If any provision or portion of any provision of this Agreement shall be held
                        to be illegal, invalid or unenforceable by a court of competent jurisdiction, it is the
                        intention of the parties that the remaining provisions or portions thereof shall constitute
                        their agreement with respect to the subject matter hereof, and all such remaining provisions or
                        portions thereof shall remain in full force and effect.</p>

                    <h2>Changes and amendments</h2>

                    <p>We reserve the right to modify this Agreement or its policies relating to the Website or Services
                        at any time, effective upon posting of an updated version of this Agreement on the Website. When
                        we do, we will post a notification on the main page of our Website. Continued use of the Website
                        after any such changes shall constitute your consent to such changes. Policy was created with <a
                            style="color:inherit" target="_blank" title="Terms and conditions generator"
                            href="https://www.websitepolicies.com/blog/sample-terms-conditions-template">WebsitePolicies</a>.
                    </p>

                    <h2>Acceptance of these terms</h2>

                    <p>You acknowledge that you have read this Agreement and agree to all its terms and conditions. By
                        using the Website or its Services you agree to be bound by this Agreement. If you do not agree
                        to abide by the terms of this Agreement, you are not authorized to use or access the Website and
                        its Services.</p>

                    <h2>Contacting us</h2>

                    <p>If you have any questions about this Agreement, please contact us.</p>
                    <p>Veracity of this document can be seen in <a
                            href="https://www.websitepolicies.com/policies/view/76yF7OFm">here</a>.</p>
                    <p>This document was last updated on July 19, 2019</p>
                </div>
            </div>
        </div>
    </div>
    <div id="privacy-policy" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h1>Privacy policy</h1>

                    <p>This privacy policy (&quot;Policy&quot;) describes how Website Operator (&quot;Website
                        Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;) collects, protects and uses
                        the personally identifiable information (&quot;Personal Information&quot;) you
                        (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) may provide on the <a target="_blank"
                            rel="nofollow" href="https://icronica.iconnicws.com">icronica.iconnicws.com</a> website and
                        any of its products or services (collectively, &quot;Website&quot; or &quot;Services&quot;). It
                        also describes the choices available to you regarding our use of your Personal Information and
                        how you can access and update this information. This Policy does not apply to the practices of
                        companies that we do not own or control, or to individuals that we do not employ or manage.</p>

                    <h2>Collection of personal information</h2>

                    <p>We receive and store any information you knowingly provide to us when you create an account,
                        publish content, fill any online forms on the Website. When required this information may
                        include your email address, name, phone number, or other Personal Information. You can choose
                        not to provide us with certain information, but then you may not be able to take advantage of
                        some of the Website's features. Users who are uncertain about what information is mandatory are
                        welcome to contact us.</p>

                    <h2>Collection of non-personal information</h2>

                    <p>When you visit the Website our servers automatically record information that your browser sends.
                        This data may include information such as your device's IP address, browser type and version,
                        operating system type and version, language preferences or the webpage you were visiting before
                        you came to our Website, pages of our Website that you visit, the time spent on those pages,
                        information you search for on our Website, access times and dates, and other statistics.</p>

                    <h2>Managing personal information</h2>

                    <p>You are able to access, add to, update and delete certain Personal Information about you. The
                        information you can view, update, and delete may change as the Website or Services change. When
                        you update information, however, we may maintain a copy of the unrevised information in our
                        records. Some information may remain in our private records after your deletion of such
                        information from your account. We will retain and use your information as necessary to comply
                        with our legal obligations, resolve disputes, and enforce our agreements. We may use any
                        aggregated data derived from or incorporating your Personal Information after you update or
                        delete it, but not in a manner that would identify you personally. Once the retention period
                        expires, Personal Information shall be deleted. Therefore, the right to access, the right to
                        erasure, the right to rectification and the right to data portability cannot be enforced after
                        the expiration of the retention period.</p>

                    <h2>Use and processing of collected information</h2>

                    <p>Any of the information we collect from you may be used to personalize your experience; improve
                        our Website; improve customer service and respond to queries and emails of our customers; send
                        notification emails such as password reminders, updates, etc; run and operate our Website and
                        Services. Non-Personal Information collected is used only to identify potential cases of abuse
                        and establish statistical information regarding Website usage. This statistical information is
                        not otherwise aggregated in such a way that would identify any particular user of the system.
                    </p>

                    <p>We may process Personal Information related to you if one of the following applies: (i) You have
                        given your consent for one or more specific purposes. Note that under some legislations we may
                        be allowed to process information until you object to such processing (by opting out), without
                        having to rely on consent or any other of the following legal bases below. This, however, does
                        not apply, whenever the processing of Personal Information is subject to European data
                        protection law; (ii) Provision of information is necessary for the performance of an agreement
                        with you and/or for any pre-contractual obligations thereof; (iii) Processing is necessary for
                        compliance with a legal obligation to which you are subject; (iv) Processing is related to a
                        task that is carried out in the public interest or in the exercise of official authority vested
                        in us; (v) Processing is necessary for the purposes of the legitimate interests pursued by us or
                        by a third party. In any case, we will be happy to clarify the specific legal basis that applies
                        to the processing, and in particular whether the provision of Personal Data is a statutory or
                        contractual requirement, or a requirement necessary to enter into a contract.</p>

                    <h2>Information transfer and storage</h2>

                    <p>Depending on your location, data transfers may involve transferring and storing your information
                        in a country other than your own. You are entitled to learn about the legal basis of information
                        transfers to a country outside the European Union or to any international organization governed
                        by public international law or set up by two or more countries, such as the UN, and about the
                        security measures taken by us to safeguard your information. If any such transfer takes place,
                        you can find out more by checking the relevant sections of this document or inquire with us
                        using the information provided in the contact section.</p>

                    <h2>The rights of users</h2>

                    <p>You may exercise certain rights regarding your information processed by us. In particular, you
                        have the right to do the following: (i) you have the right to withdraw consent where you have
                        previously given your consent to the processing of your information; (ii) you have the right to
                        object to the processing of your information if the processing is carried out on a legal basis
                        other than consent; (iii) you have the right to learn if information is being processed by us,
                        obtain disclosure regarding certain aspects of the processing and obtain a copy of the
                        information undergoing processing; (iv) you have the right to verify the accuracy of your
                        information and ask for it to be updated or corrected; (v) you have the right, under certain
                        circumstances, to restrict the processing of your information, in which case, we will not
                        process your information for any purpose other than storing it; (vi) you have the right, under
                        certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you
                        have the right to receive your information in a structured, commonly used and machine readable
                        format and, if technically feasible, to have it transmitted to another controller without any
                        hindrance. This provision is applicable provided that your information is processed by automated
                        means and that the processing is based on your consent, on a contract which you are part of or
                        on pre-contractual obligations thereof.</p>

                    <h2>The right to object to processing</h2>

                    <p>Where Personal Information is processed for the public interest, in the exercise of an official
                        authority vested in us or for the purposes of the legitimate interests pursued by us, you may
                        object to such processing by providing a ground related to your particular situation to justify
                        the objection. You must know that, however, should your Personal Information be processed for
                        direct marketing purposes, you can object to that processing at any time without providing any
                        justification. To learn, whether we are processing Personal Information for direct marketing
                        purposes, you may refer to the relevant sections of this document.</p>

                    <h2>How to exercise these rights</h2>

                    <p>Any requests to exercise User rights can be directed to the Owner through the contact details
                        provided in this document. These requests can be exercised free of charge and will be addressed
                        by the Owner as early as possible and always within one month.</p>

                    <h2>Privacy of children</h2>

                    <p>We do not knowingly collect any Personal Information from children under the age of 13. If you
                        are under the age of 13, please do not submit any Personal Information through our Website or
                        Service. We encourage parents and legal guardians to monitor their children's Internet usage and
                        to help enforce this Policy by instructing their children never to provide Personal Information
                        through our Website or Service without their permission. If you have reason to believe that a
                        child under the age of 13 has provided Personal Information to us through our Website or
                        Service, please contact us. You must also be at least 16 years of age to consent to the
                        processing of your personal data in your country (in some countries we may allow your parent or
                        guardian to do so on your behalf).</p>

                    <h2>Do Not Track signals</h2>

                    <p>Some browsers incorporate a Do Not Track feature that signals to websites you visit that you do
                        not want to have your online activity tracked. Tracking is not the same as using or collecting
                        information in connection with a website. For these purposes, tracking refers to collecting
                        personally identifiable information from consumers who use or visit a website or online service
                        as they move across different websites over time. How browsers communicate the Do Not Track
                        signal is not yet uniform. As a result, this Website is not yet set up to interpret or respond
                        to Do Not Track signals communicated by your browser. Even so, as described in more detail
                        throughout this Policy, we limit our use and collection of your personal information.</p>

                    <h2>Affiliates</h2>

                    <p>We may disclose information about you to our affiliates for the purpose of being able to offer
                        you related or additional products and services. Any information relating to you that we provide
                        to our affiliates will be treated by those affiliates in accordance with the terms of this
                        Privacy Policy.</p>

                    <h2>Links to other websites</h2>

                    <p>Our Website contains links to other websites that are not owned or controlled by us. Please be
                        aware that we are not responsible for the privacy practices of such other websites or
                        third-parties. We encourage you to be aware when you leave our Website and to read the privacy
                        statements of each and every website that may collect Personal Information.</p>

                    <h2>Information security</h2>

                    <p>We secure information you provide on computer servers in a controlled, secure environment,
                        protected from unauthorized access, use, or disclosure. We maintain reasonable administrative,
                        technical, and physical safeguards in an effort to protect against unauthorized access, use,
                        modification, and disclosure of Personal Information in its control and custody. However, no
                        data transmission over the Internet or wireless network can be guaranteed. Therefore, while we
                        strive to protect your Personal Information, you acknowledge that (i) there are security and
                        privacy limitations of the Internet which are beyond our control; (ii) the security, integrity,
                        and privacy of any and all information and data exchanged between you and our Website cannot be
                        guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by
                        a third-party, despite best efforts.</p>

                    <h2>Data breach</h2>

                    <p>In the event we become aware that the security of the Website has been compromised or users
                        Personal Information has been disclosed to unrelated third parties as a result of external
                        activity, including, but not limited to, security attacks or fraud, we reserve the right to take
                        reasonably appropriate measures, including, but not limited to, investigation and reporting, as
                        well as notification to and cooperation with law enforcement authorities. In the event of a data
                        breach, we will make reasonable efforts to notify affected individuals if we believe that there
                        is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise
                        required by law. When we do, we will post a notice on the Website.</p>

                    <h2>Legal disclosure</h2>

                    <p>We will disclose any information we collect, use or receive if required or permitted by law, such
                        as to comply with a subpoena, or similar legal process, and when we believe in good faith that
                        disclosure is necessary to protect our rights, protect your safety or the safety of others,
                        investigate fraud, or respond to a government request. In the event we go through a business
                        transition, such as a merger or acquisition by another company, or sale of all or a portion of
                        its assets, your user account, and personal data will likely be among the assets transferred.
                    </p>

                    <h2>Changes and amendments</h2>

                    <p>We reserve the right to modify this Policy relating to the Website or Services at any time,
                        effective upon posting of an updated version of this Policy on the Website. When we do we will
                        post a notification on the main page of our Website. Continued use of the Website after any such
                        changes shall constitute your consent to such changes. Policy was created with <a
                            style="color:inherit" target="_blank" title="Privacy policy generator"
                            href="https://www.websitepolicies.com/blog/sample-privacy-policy-template">WebsitePolicies</a>.
                    </p>

                    <h2>Acceptance of this policy</h2>

                    <p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By
                        using the Website or its Services you agree to be bound by this Policy. If you do not agree to
                        abide by the terms of this Policy, you are not authorized to use or access the Website and its
                        Services.</p>

                    <h2>Contacting us</h2>

                    <p>If you have any questions about this Policy, please contact us.</p>
                    <p>Veracity of this document can be seen in <a
                            href="https://www.websitepolicies.com/policies/view/zbNAlfju">here</a>.</p>
                    <p>This document was last updated on July 19, 2019</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
