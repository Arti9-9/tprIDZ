PGDMP                         y            db_tpr    12.2    13.2     I           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            J           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            K           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            L           1262    24803    db_tpr    DATABASE     c   CREATE DATABASE db_tpr WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Russian_Russia.1251';
    DROP DATABASE db_tpr;
                postgres    false            :          0    24804    doctrine_migration_versions 
   TABLE DATA           [   COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
    public          postgres    false    202   �       >          0    24816 	   equipment 
   TABLE DATA           ]   COPY public.equipment (id, name, description, techical_index, reliability, date) FROM stdin;
    public          postgres    false    206   0       ?          0    24825    functional_unit 
   TABLE DATA           Z   COPY public.functional_unit (id, equipment_id, name, weight, appraisal, date) FROM stdin;
    public          postgres    false    207   �       @          0    24831    group_parameter 
   TABLE DATA           W   COPY public.group_parameter (id, functional_unit_id, name, weight, lambda) FROM stdin;
    public          postgres    false    208          D          0    32963    reliabilities 
   TABLE DATA           G   COPY public.reliabilities (id, equipments_id, value, date) FROM stdin;
    public          postgres    false    212   �       E          0    32969    reliabilities_igr_p 
   TABLE DATA           Q   COPY public.reliabilities_igr_p (id, group_parametr_id, value, date) FROM stdin;
    public          postgres    false    213   �       F          0    32975    techical_indexs 
   TABLE DATA           H   COPY public.techical_indexs (id, equipment_id, value, date) FROM stdin;
    public          postgres    false    214           M           0    0    equipment_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.equipment_id_seq', 2, true);
          public          postgres    false    203            N           0    0    functional_unit_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.functional_unit_id_seq', 10, true);
          public          postgres    false    204            O           0    0    group_parameter_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.group_parameter_id_seq', 15, true);
          public          postgres    false    205            P           0    0    reliabilities_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.reliabilities_id_seq', 6, true);
          public          postgres    false    209            Q           0    0    reliabilities_igr_p_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.reliabilities_igr_p_id_seq', 90, true);
          public          postgres    false    210            R           0    0    techical_indexs_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.techical_indexs_id_seq', 7, true);
          public          postgres    false    211            :   �   x��Ͻ
�0��9���@�|?�i殮NYD�di!��cAp��y�μ=����ڞ�~�m�k�-}�������N���QT��!������#D��H�R!1�B&J�
�Q*�1��%� D�a��z�־ ;�H�      >   k   x�3估�b�ņ/츰��4��@Ύ{.l���if���id`h�k`�k`�`hae`de`�e�yaʅIB)���@��A�����Y*X�W� �;:(      ?   \   x�m��� �sR���� �؝Y���'�����$Y��tRQ$�T�P4Da�H;Bq��Ee��T���#5P�O��b�]ݙ�?!�%      @   m   x�U���0��c+p`7�t�9�	��C p8|��5�\�1�*j7��(�N)b�e�	��E�i���G�N7��k�m~��0��@��8˜�8,e<�d��;���d,�      D   9   x�}˹  �:��/ޅ��@���t��X���t��`x�,L��������� � �      E     x�����1m*���#2��?���v��!�
�F���>�Q6ꁗ�-[�}�>�˷l��z�b�1�/�┇�)IyI�y&һ�w����CyKS>2��=rkNv��P1�nhT�b�'���԰��bN�*�XR��C��CG�c�Щ|�4>tn>t::��y:�2t���ٗ�s.C�^��[ѳ�N��E�Ӣ�i��hpZ48-z��EC�EC�EC�EC�EC�EC��N��E�jZ48-�N��E��!�!�!�!�g/z��Yk�f�a(      F   ?   x�]�� !�7ۋ��`/�_�x�2��P(#��6Zi��}v��}����gy�s�����Y,A�9     